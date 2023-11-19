<?php

namespace Dcat\Admin;

enum DcatIcon : string
{
    public const PREFIX = 'bx-';
    public const BASE = 'bx ';

    case CALENDAR = 'calendar';
    case HOME = 'home';
    case SETTINGS = 'cog';
    case LOGOUT = 'power-off';

    public static function __callStatic($name, $args)
    {
        $cases = static::cases();

        foreach ($cases as $case) {
            if ($case->name === $name) {
                return self::BASE.self::PREFIX.$case->value;
            }
        }
    }
}
