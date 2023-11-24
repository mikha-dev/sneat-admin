<?php

namespace Dcat\Admin\Traits;

use App\Models\User;
use Dcat\Admin\Http\Repositories\ActivationRepository;
use Illuminate\Support\Facades\Validator;

trait ActivationTrait
{
    public function initiateEmailActivation(User $user)
    {
        if (!config('admin.registration-activation-enabled') || !$this->validateEmail($user)) {
            return true;
        }

        $activationRepository = new ActivationRepository();
        $activationRepository->createTokenAndSendEmail($user);
    }

    protected function validateEmail(User $user): bool
    {
        $validator = Validator::make(
            ['email' => $user->email],
            ['email' => 'required|email']
        );
        return !$validator->fails();
    }
}
