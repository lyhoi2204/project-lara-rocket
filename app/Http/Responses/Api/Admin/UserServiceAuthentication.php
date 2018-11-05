<?php

namespace App\Http\Responses\Api\Admin;

class UserServiceAuthentication extends Response
{
    protected $columns = [
        'id' => 0,
        'name' => '',
        'email' => '',
        'service' => '',
        'serviceId' => '',
        'imageUrl' => '',
    ];

    /**
     * @param  \App\Models\UserServiceAuthentication $model
     *
     * @return  static
     */
    public static function updateWithModel($model)
    {
        $response = new static([], 400);
        if(!empty($model)) {
            $modelArray = [
                'id' => $model->id,
                'name' => $model->name,
                'email' => $model->email,
                'service' => $model->service,
                'serviceId' => $model->service_id,
                'imageUrl' => $model->image_url,
            ];
            $response   = new static($modelArray, 200);
        }

        return $response;
    }
}
