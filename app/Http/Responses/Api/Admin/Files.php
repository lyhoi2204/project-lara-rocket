<?php

namespace App\Http\Responses\Api\Admin;

class Files extends ListBase
{
    protected static $itemsResponseModel = File::class;
}
