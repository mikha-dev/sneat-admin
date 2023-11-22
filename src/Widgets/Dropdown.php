<?php

namespace Dcat\Admin\Widgets;

use Dcat\Admin\Support\Helper;
use Illuminate\Support\Str;

class Dropdown extends Widget
{
    protected $view = 'admin::widgets.dropdown';

    protected array $items = [];

    /**
     * @var array
     */
    protected $button = [
        'text'  => null,
        'class' => 'btn btn-secondary',
        'icon' => null,
	    'split'=>FALSE,
    ];

    protected string $buttonId = '';
    /**
     * @var bool
     */
    protected $click = false;

    protected string $direction = 'down';

    public function __construct(array $options = [])
    {
	    $this->options($options);
		return $this;
    }

    /**
     * Set the options of dropdown menus.
     *
     * @param  array  $options
     * @param  string|null  $title
     * @return $this
     */
    public function items(array $options = [])
    {
        $this->items = array_merge($this->items, Helper::array($options));

        return $this;
    }

    /**
     * Set the button text.
     *
     * @param  string|null  $text
     * @return $this
     */
    public function button(string $text)
    {
        $this->button['text'] = $text;

        return $this;
    }

    public function icon(string $icon)
    {
        $this->button['icon'] = $icon;

        return $this;
    }

    /**
     * Set the button class.
     *
     * @param  string  $class
     * @return $this
     */
    public function buttonClass(string $class)
    {
        $this->button['class'] = $class;

        return $this;
    }

	public function hideArrow() {
		$this->button['class'].=' hide-arrow';
		return $this;
	}

	public function toggleSplit() {
		$this->button['class'].=' dropdown-toggle-split';
		$this->button['split']=True;
		return $this;
	}

    public function direction(string $direction = 'down')
    {
        $this->direction = $direction;

        return $this;
    }

    public function up()
    {
        return $this->direction('up');
    }

    public function down()
    {
        return $this->direction('down');
    }

    public function start()
    {
        return $this->direction('start');
    }

    public function end()
    {
        return $this->direction('end');
    }
    /**
     * Add click event listener.
     *
     * @param  string|null  $defaultLabel
     * @return $this
     */
    public function click(?string $defaultLabel = null)
    {
        $this->click = true;

        $this->buttonId = 'dropd-'.Str::random(8);

        if ($defaultLabel !== null) {
            $this->button($defaultLabel);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getButtonId()
    {
        return $this->buttonId;
    }

    public function add(string $title, bool $disabled = false,bool $divider=FALSE)
    {
        $this->items[] = [
            'title'   => $title,
            'disabled' => $disabled,
	        'divider' => $divider,
        ];

        return $this;
    }

    /**
     * Add item.
     *
     * @param string $title
     * @param string $content
     *
     * @return $this
     */
    public function addDivider()
    {
        $this->items[] = [

        ];

        return $this;
    }
    /**
     * @return string
     */
    public function render()
    {
        $this->addVariables([
            'items'      => $this->items,
            'button'    => $this->button,
            'buttonId'  => $this->buttonId,
            'click'     => $this->click,
            'direction' => $this->direction,
        ]);

        return parent::render();
    }
}
