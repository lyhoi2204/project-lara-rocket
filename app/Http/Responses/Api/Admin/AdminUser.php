<?php

namespace App\Http\Responses\Api\Admin;

class AdminUser extends Response
{
    protected $columns = [
        'id' => 0,
        'name' => '',
        'email' => '',
        'createdAt' => null,
        'updatedAt' => null,
        'profileImage' => null,
        'adminUserRoles' => [],
    ];

    /**
     * @param  \App\Models\AdminUser $model
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
                'createdAt' => $model->created_at ? $model->created_at->timestamp : null,
                'updatedAt' => $model->updated_at ? $model->updated_at->timestamp : null,
                'profileImage' => empty($model->profileImage) ? null : Image::updateWithModel($model->profileImage),
                'adminUserRoles' => !empty($model->adminUserRoles) ? AdminUserRoles::updateWithModel($model->adminUserRoles) : null,
            ];
            $response   = new static($modelArray, 200);
        }

        return $response;
    }
}
