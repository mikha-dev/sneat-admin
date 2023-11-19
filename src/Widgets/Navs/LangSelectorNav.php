<?php

namespace Dcat\Admin\Widgets\Navs;

use Dcat\Admin\Contracts\NavElement;
use Dcat\Admin\Widgets\Widget;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Support\Renderable;

class LangSelectorNav extends Widget implements Renderable, NavElement
{
    protected $view = 'admin::widgets.lang-selector';

    public function __construct()
    {
        $this->id('lang-selector-' . uniqid());
    }

    public function defaultVariables()
    {
        return [
            'current_url' => request()->path(),
            'current_locale' => App::getLocale(),
            'locales' => config('admin.supported_locales'),
            'attributes' => $this->formatAttributes(),
        ];
    }
}
