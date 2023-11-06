<?php

namespace Dcat\Admin\Enums;

use Dcat\Admin\DcatEnum;
use Dcat\Admin\Traits\DcatEnumTrait;

enum LayoutModeType : string implements DcatEnum
{
    use DcatEnumTrait;

    case LIGHT = 'light';
    case DARK = 'dark';
    case SYSTEM = 'system';
}
