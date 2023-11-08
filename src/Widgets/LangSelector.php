<?php

namespace Dcat\Admin\Layout;

use Dcat\Admin\Widgets\Navs\LangSelectorNav;
use Illuminate\Contracts\Support\Renderable;

class LangSelector implements Renderable
{
    public function render() : string {
        return (new LangSelectorNav())->render();
    }
}
