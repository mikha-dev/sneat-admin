<?php

namespace Dcat\Admin\Layout;

class UserNavElement
{

    public function __construct(protected UserNav $nav, public string $url, public string $icon, public string $title, public ?ColoredBadge $badge = null,  public bool $hasDivider = false)
    {
    }
}
