<?php

namespace Dcat\Admin\Widgets\Navs;

use Dcat\Admin\Admin;

class DashboardNotificationNav extends NotificationNav
{
    public function __construct( )
    {
        parent::__construct(admin_url('notifications'));

        $notifications = Admin::user()->dashboardNotifications();

        foreach($notifications as $notification) {
            $this->elements[] = $notification;
        }

    }
}
