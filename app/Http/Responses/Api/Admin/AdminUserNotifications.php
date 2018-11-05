<?php

namespace App\Http\Responses\Api\Admin;

class AdminUserNotifications extends ListBase
{
    protected static $itemsResponseModel = AdminUserNotification::class;
}
