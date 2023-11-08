<?php

namespace Dcat\Admin\Widgets\Navs;

use Dcat\Admin\Traits\HasBuilderEvents;
use Illuminate\Contracts\Support\Renderable;

class ShortcutsNav implements Renderable
{
    protected string $view = 'admin::widgets.shortcuts';

    use HasBuilderEvents;

    protected array $elements = [];
    protected bool $canAddShortcut = false;

    public function __construct()
    {
        $this->elements = collect();
    }

    protected function canAddShortcut(bool $value = false) {
        $this->canAddShortcut = $value;
    }

    public function add(string $icon, string $title, string $description, string $url) : ShortcutsNav
    {
        $this->elements[] = [
            'icon' => $icon,
            'title' => $title,
            'description' => $description,
            'url' => $url,
        ];

        return $this;
    }

    public function view(string $view) : ShortcutsNav
    {
        $this->view = $view;

        return $this;
    }

    public function render()
    {
        return view($this->view, ['items' => $this->elements, 'canAddShortcut' => $this->canAddShortcut])->render();
    }
}
