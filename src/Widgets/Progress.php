<?php

namespace Dcat\Admin\Widgets;

class Progress extends Widget
{
    protected $view = 'admin::widgets.progress';

    private int $value = 0;
    private int $min = 0;
    private int $max = 100;
    private ?string $text;
    private ?string $height;

    public function __construct()
    {
    }

    public function height(string $value) : Progress
    {
        $this->height = 'height: '.$value;

        return $this;
    }

    public function text(string $value) : Progress
    {
        $this->text = $value;

        return $this;
    }

    public function value(int $value) : Progress
    {
        $this->value = $value;

        return $this;
    }

    public function min(int $value) : Progress
    {
        $this->min = $value;

        return $this;
    }

    public function max(int $value) : Progress
    {
        $this->max = $value;

        return $this;
    }

    private function formatText() : string {
        return $this->text ?? $this->value.'%';
    }

    public function render()
    {
        $vars = [
            'value'    => $this->value,
            'min'       => $this->min,
            'max'       => $this->max,
            'height'       => $this->height,
            'text'       => $this->formatText(),
            'attributes' => $this->formatHtmlAttributes(),
        ];

        return view($this->view, $vars)->render();
    }

    public function stripped()
    {
        $this->class('progress-bar-striped', true);

        return $this;
    }

    public function animated()
    {
        $this->class('progress-bar-animated', true);

        return $this;
    }
}
