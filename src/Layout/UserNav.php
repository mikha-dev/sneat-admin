<?php

namespace Dcat\Admin\Layout;

use Dcat\Admin\DcatIcon;
use Dcat\Admin\Enums\RouteAuth;
use Illuminate\Support\Collection;
use Dcat\Admin\Layout\UserNavElement;
use Dcat\Admin\Traits\HasBuilderEvents;

class UserNav
{
    use HasBuilderEvents;

    protected Collection $elements;

    public function __construct()
    {
        $this->elements = collect();
    }

    protected function init() : void {
        $this->put(new UserNavElement($this, admin_route(RouteAuth::SETTINGS()), DcatIcon::SETTINGS(), __('admin.settings'), null, true));
        $this->put(new UserNavElement($this, admin_route(RouteAuth::LOGOUT()), DcatIcon::LOGOUT(), __('admin.settings')));
    }

    public function put(UserNavElement $element) : UserNav
    {
        $this->elements->push($element);

        return $this;
    }

    public function all() : Collection {
        return $this->elements;
    }
}
