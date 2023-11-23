<?php

namespace Dcat\Admin\Widgets;

use Dcat\Admin\DcatIcon;
use Illuminate\Support\Str;
use Dcat\Admin\Support\Helper;
use Dcat\Admin\Enums\ButtonClassType;

class Dropdown extends Widget
{
    protected $view = 'admin::widgets.dropdown';

    protected array $items = [];

    protected array $button = [];

    protected string $buttonId = '';

    protected bool $click = FALSE;

    protected string $direction = 'down';

    protected bool $isRounded = false;

    public function __construct(array $options = [])
    {
        $this->button = [
            'text' => NULL,
            'class' => ButtonClassType::SECONDARY(),
            'icon' => NULL,
            'arrow' => FALSE,
            'split' => FALSE,
        ];

        $this->options($options);

        return $this;
    }

    /**
     * Set the options of dropdown menus.
     */
    public function items(array $options = []): Dropdown
    {
        $this->items = array_merge($this->items, Helper::array($options));
        return $this;
    }

    public function rounded(bool $value = true) : Dropdown {
        $this->isRounded = $value;

        return $this;
    }

    /**
     * Set the button text.
     */
    public function button(?string $text = null): Dropdown
    {
        $this->button['text'] = $text;
        return $this;
    }

    public function icon(DcatIcon $icon): Dropdown
    {
        $this->button['icon'] = $icon->_();
        return $this;
    }

    /**
     * Set the button class.
     */
    public function buttonClass(ButtonClassType $class, bool $isOutline = false): Dropdown
    {
        $this->button['class'] = $class->_($isOutline);
        return $this;
    }

    public function hideArrow(): Dropdown
    {
        $this->button['arrow'] = TRUE;
        return $this;
    }

    public function toggleSplit(): Dropdown
    {
        $this->button['split'] = TRUE;
        return $this;
    }

    public function direction(string $direction = 'down'): Dropdown
    {
        $this->direction = $direction;
        return $this;
    }

    public function up(): Dropdown
    {
        return $this->direction('up');
    }

    public function down(): Dropdown
    {
        return $this->direction('down');
    }

    public function start(): Dropdown
    {
        return $this->direction('start');
    }

    public function end(): Dropdown
    {
        return $this->direction('end');
    }

    /**
     * Add click event listener.
     */
    public function click(?string $defaultLabel = NULL): Dropdown
    {
        $this->click = TRUE;
        $this->buttonId = 'dropd-' . Str::random(8);
        if ($defaultLabel !== NULL) {
            $this->button($defaultLabel);
        }
        return $this;
    }

    public function getButtonId(): string
    {
        return $this->buttonId;
    }

    public function add(string $title, bool $disabled = FALSE, bool $divider = FALSE): Dropdown
    {
        $this->items[] = [
            'title' => $title,
            'disabled' => $disabled,
            'divider' => $divider,
        ];
        return $this;
    }

    public function render(): string
    {
        $this->addVariables([
            'items' => $this->items,
            'button' => $this->button,
            'buttonId' => $this->buttonId,
            'click' => $this->click,
            'direction' => $this->direction,
            'rounded' => $this->isRounded
        ]);
        return parent::render();
    }
}
