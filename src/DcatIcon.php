<?php

namespace Dcat\Admin;

enum DcatIcon : string
{
    public const PREFIX = 'bx-';
    public const BASE = 'bx ';

    case CALENDAR = 'calendar';
    case HOME = 'home';
    case HELP = 'help-circle';
    case HOME_CIRCLE = 'home-circle';
    case SETTINGS = 'cog';
    case LOGOUT = 'power-off';
    case GLOBE = 'globe';
    case DOTS_VERTICAL_ROUNDED = 'dots-vertical-rounded';
    case MENU = 'menu me-1';

    public function _() {
        return self::format($this);
    }

    public static function __callStatic($name, $args)
    {
        $cases = static::cases();

        foreach ($cases as $case) {
            if ($case->name === $name) {
                return self::format($case);
            }
        }
    }

    public static function format(DcatIcon $icon)  : string {
        return self::BASE.self::PREFIX.$icon->value;
    }
}
