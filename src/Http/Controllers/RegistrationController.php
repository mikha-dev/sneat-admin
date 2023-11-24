<?php

namespace Dcat\Admin\Http\Controllers;

use App\Models\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Enums\RegisterLayoutType;
use Dcat\Admin\Traits\ActivationTrait;
use Illuminate\Http\Request;
use Dcat\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Dcat\Admin\Traits\HasFormResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller {
	use ActivationTrait;
	use HasFormResponse;

	protected string $view;

	public function __construct() {
		$this->view = match (Admin::registerLayoutType()) {
			RegisterLayoutType::BASIC => 'admin::pages.authentications.auth-register-basic',
			RegisterLayoutType::COVER => 'admin::pages.authentications.auth-register-cover'
		};
		Admin::asset()->css([
			'pages/page-auth.css',
			//'@form-validation/umd/styles/index.min.css'
		]);
		Admin::asset()->font([
			'boxicons.css',
			//'@form-validation/umd/styles/index.min.css'
		]);
		// Admin::asset()->js([
		//     'libs/@form-validation/umd/bundle/popular.min.js',
		//     'libs/@form-validation/umd/plugin-bootstrap5/index.min.js',
		//     'libs/@form-validation/umd/plugin-auto-focus/index.min.js',
		// ]);
	}

	public function getRegister(Content $content) {
		dd($this->guard());
		if ( $this->guard()->check() ) {
			return redirect($this->getRedirectPath());
		}
		return $content->full()->body($this->view);
	}

	public function store(Request $request) {
		$this->validator($request->all())->validate();
		$user = $this->create($request->all());
		event(new Registered($user));
		return $this->response()
			->success(trans('admin.register_successful'))
			->with('registered', __('admin.check_email_activation'))
			->refresh()
			->send();
	}

	protected function validator(array $data) {
		return Validator::make($data,
			[
				'name' => 'required|max:255',
				'email' => 'required|email|max:255|unique:admin_users',
				'password' => 'required|min:6|max:30|confirmed',
				'password_confirmation' => 'required|same:password',
			],
			[
				'name.required' => trans('auth.userNameRequired'),
				'email.required' => trans('auth.emailRequired'),
				'email.email' => trans('auth.emailInvalid'),
				'password.required' => trans('auth.passwordRequired'),
				'password.min' => trans('auth.PasswordMin'),
				'password.max' => trans('auth.PasswordMax'),
			]
		);
	}

	protected function create(array $data)
	: User {
		$user = User::create([
			'name' => $data['name'],
			'username' => $data['email'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
			'signup_ip' => \Request::getClientIp(),
			'activated' => !config('admin.registration-activation-enabled'),
			'creator_id' => Admin::domain()->manager_id,
			'domain_id' => Admin::domain()->id,
		]);
		$this->initiateEmailActivation($user);
		event(new \App\Events\UserReferred(request()->cookie('ref'), $user));
		return $user;
	}

	protected function guard() {
		return Admin::guard();
	}

	protected function getRedirectPath() {
		return admin_url('/');
	}

}
