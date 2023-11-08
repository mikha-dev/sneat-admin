<?php

namespace Dcat\Admin\Widgets;

use Dcat\Admin\Admin;
use Dcat\Admin\Enums\DarkModeType;
use Illuminate\Contracts\Support\Renderable;

class DarkModeSwitcherNav implements Renderable
{
    protected string $view = 'admin::widgets.darkmode-switcher';
    private DarkModeType $curerntMode = DarkModeType::SYSTEM;

    public function __construct()
    {
    }

    public function render()
    {
        return view($this->view, ['current_mode' => Admin::darkMode()->value]);
    }
}
