<?php
declare(strict_types=1);

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
    case EMAIL = 'envelope';
    case HIDE = 'hide';
    case PENCIL = 'pencil';

    public function _(bool $fullTag = false) {
        return self::format($this, $fullTag);
    }

    public static function __callStatic($name, $args)
    {
        $fullTag = false;
        if($args && count($args) > 0) {
            $fullTag = true;
        }

        $cases = static::cases();

        foreach ($cases as $case) {
            if ($case->name === $name) {
                return $case->_($fullTag);
            }
        }
    }

    public static function format(DcatIcon $icon, bool $fullTag = false)  : string {
        $t = self::BASE.self::PREFIX.$icon->value;

        if($fullTag)
            return '<i class="'.$t.'"></i>';

        return $t;
    }
}
