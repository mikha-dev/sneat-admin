<?php

namespace Dcat\Admin\Enums;

use Dcat\Admin\DcatEnum;
use Dcat\Admin\Traits\DcatEnumTrait;

enum RegisterLayoutType : string implements DcatEnum
{
    use DcatEnumTrait;

    case BASIC = 'basic';
    case COVER = 'cover';
}
