<?php

namespace Dcat\Admin\Widgets;

use App\Enums\ButtonClassType;
use Dcat\Admin\Support\Helper;
use Illuminate\Support\Str;

class Dropdown extends Widget {
	protected $view = 'admin::widgets.dropdown';

	protected array $items = [];

	/**
	 * @var array
	 */
	protected array $button = [
		'text' => NULL,
		'class' => ButtonClassType::BTN . ' ' . ButtonClassType::BTN_SECONDARY,
		'icon' => NULL,
		'arrow' => FALSE,
		'split' => FALSE,
	];

	protected string $buttonId = '';
	/**
	 * @var bool
	 */
	protected bool $click = FALSE;

	protected string $direction = 'down';

	public function __construct(array $options = []) {
		$this->options($options);
		return $this;
	}

	/**
	 * Set the options of dropdown menus.
	 *
	 * @param array $options
	 * @param string|null $title
	 *
	 * @return $this
	 */
	public function items(array $options = [])
	: Dropdown {
		$this->items = array_merge($this->items, Helper::array($options));
		return $this;
	}

	/**
	 * Set the button text.
	 *
	 * @param string|null $text
	 *
	 * @return $this
	 */
	public function button(string $text)
	: Dropdown {
		$this->button['text'] = $text;
		return $this;
	}

	public function icon(string $icon)
	: Dropdown {
		$this->button['icon'] = $icon;
		return $this;
	}

	/**
	 * Set the button class.
	 *
	 * @param string $class
	 *
	 * @return $this
	 */
	public function buttonClass(string $class)
	: Dropdown {
		$this->button['class'] = $class;
		return $this;
	}

	public function hideArrow()
	: Dropdown {
		$this->button['arrow'] = TRUE;
		return $this;
	}

	public function toggleSplit()
	: Dropdown {
		$this->button['split'] = TRUE;
		return $this;
	}

	public function direction(string $direction = 'down')
	: Dropdown {
		$this->direction = $direction;
		return $this;
	}

	public function up()
	: Dropdown {
		return $this->direction('up');
	}

	public function down()
	: Dropdown {
		return $this->direction('down');
	}

	public function start()
	: Dropdown {
		return $this->direction('start');
	}

	public function end()
	: Dropdown {
		return $this->direction('end');
	}

	/**
	 * Add click event listener.
	 *
	 * @param string|null $defaultLabel
	 *
	 * @return $this
	 */
	public function click(?string $defaultLabel = NULL)
	: Dropdown {
		$this->click = TRUE;
		$this->buttonId = 'dropd-' . Str::random(8);
		if ( $defaultLabel !== NULL ) {
			$this->button($defaultLabel);
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function getButtonId()
	: string {
		return $this->buttonId;
	}

	public function add(string $title, bool $disabled = FALSE, bool $divider = FALSE)
	: Dropdown {
		$this->items[] = [
			'title' => $title,
			'disabled' => $disabled,
			'divider' => $divider,
		];
		return $this;
	}

	/**
	 * @return string
	 */
	public function render()
	: string {
		$this->addVariables([
			'items' => $this->items,
			'button' => $this->button,
			'buttonId' => $this->buttonId,
			'click' => $this->click,
			'direction' => $this->direction,
		]);
		return parent::render();
	}
}
