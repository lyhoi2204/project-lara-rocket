<?php

namespace App\Http\Responses\Api\Admin;

class AdminUserRole extends Response
{
    protected $columns = [
        'id' => 0,
        'adminUserId' => 0,
        'role' => '',
        'createdAt' => null,
        'updatedAt' => null,
        'adminUser' => null,
    ];

    /**
     * @param  \App\Models\AdminUserRole $model
     *
     * @return  static
     */
    public static function updateWithModel($model)
    {
        $response = new static([], 400);
        if(!empty($model)) {
            $modelArray = [
                'id' => $model->id,
                'adminUserId' => $model->admin_user_id,
                'role' => $model->role,
                'createdAt' => $model->created_at ? $model->created_at->timestamp : null,
                'updatedAt' => $model->updated_at ? $model->updated_at->timestamp : null,
                'adminUser' => empty($model->adminUser) ? null : AdminUser::updateWithModel($model->adminUser),
            ];
            $response   = new static($modelArray, 200);
        }

        return $response;
    }
}
