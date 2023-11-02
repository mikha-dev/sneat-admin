<?php

namespace Dcat\Admin\Widgets;

use Dcat\Admin\Admin;
use Illuminate\Contracts\Support\Renderable;

class DarkModeSwitcher implements Renderable
{
    public $defaultDarkMode = false;

    public function __construct(?bool $defaultDarkMode = null)
    {
        $this->defaultDarkMode = is_null($defaultDarkMode) ? Admin::isDarkMode() : $defaultDarkMode;
    }

    public function render()
    {
        $icon = $this->defaultDarkMode ? 'fas fa-sun' : 'fas fa-moon';

        return <<<HTML
<div class="dropdown grid-option">
    <a class="text-dark ms-4 ms-xxl-5 h5 mb-0 dark-mode-switcher">
        <i class="fa {$icon}"></i>
    </a>
</div>
HTML;
    }
}
