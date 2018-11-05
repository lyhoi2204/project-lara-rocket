<?php

namespace App\Http\Responses\Api\Admin;

class AdminUserRoles extends ListBase
{
    protected static $itemsResponseModel = AdminUserRole::class;
}
