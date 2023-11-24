<?php
declare(strict_types=1);

namespace Dcat\Admin;
enum DcatIcon: string {
	public const PREFIX = 'bx-';
	public const BASE   = 'bx ';

	case CALENDAR = 'calendar';
	case HOME = 'home';
	case HELP = 'help-circle';
	case HOME_CIRCLE = 'home-circle';
	case SETTINGS = 'cog';
	case LOGOUT = 'power-off';
	case GLOBE = 'globe';
	case DOTS_VERTICAL_ROUNDED = 'dots-vertical-rounded';
	case MENU = 'menu';
	case EMAIL = 'envelope';
	case HIDE = 'hide';
	case PENCIL = 'pencil';
	case MOBILE = 'mobile';
	case INTERNET = 'edit';
	case LAPTOP = 'laptop';
	case TERMINAL = 'terminal';
	case USER = 'user';
	case MESSAGE_SQUARE = 'message-square';


	public function _(bool $fullTag = FALSE) {
		return self::format($this, $fullTag);
	}

	public static function __callStatic($name, $args) {
		$fullTag = FALSE;
		if ( $args && count($args) > 0 ) {
			$fullTag = TRUE;
		}
		$cases = static::cases();
		foreach ($cases as $case) {
			if ( $case->name === $name ) {
				return $case->_($fullTag);
			}
		}
	}

	public static function format(DcatIcon $icon, bool $fullTag = FALSE)
	: string {
		$t = self::BASE . self::PREFIX . $icon->value;
		if ( $fullTag ) {
			return '<i class="' . $t . '"></i>';
		}
		return $t;
	}
}
