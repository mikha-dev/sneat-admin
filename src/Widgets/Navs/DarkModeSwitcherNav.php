<?php

namespace Dcat\Admin\Widgets\Navs;

use Dcat\Admin\Admin;
use Illuminate\Contracts\Support\Renderable;

class DarkModeSwitcherNav implements Renderable
{
    protected string $view = 'admin::widgets.darkmode-switcher';

    public function __construct()
    {
    }

    public function render()
    {
        return view($this->view, ['current_mode' => Admin::darkMode()->value]);
    }
}
