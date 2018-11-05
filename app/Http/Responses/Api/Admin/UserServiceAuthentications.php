<?php

namespace App\Http\Responses\Api\Admin;

class UserServiceAuthentications extends ListBase
{
    protected static $itemsResponseModel = UserServiceAuthentication::class;
}
