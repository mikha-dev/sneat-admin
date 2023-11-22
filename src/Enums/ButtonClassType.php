<?php

namespace Dcat\Admin\Enums;

enum ButtonClassType : string
{
    public const PREFIX = 'btn-';
    public const BASE = 'btn ';

    case PRIMARY = 'primary';
    case OUTLINE = 'outline';
    case NONE = '';

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

    public static function format(ButtonClassType $icon)  : string {
        return self::BASE.self::PREFIX.$icon->value;
    }
}
