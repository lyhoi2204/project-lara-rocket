<?php

namespace App\Http\Responses\Api\Admin;

class AdminUserNotification extends Response
{
    protected $columns = [
        'id' => 0,
        'adminUserId' => 0,
        'type' => '',
        'data' => null,
        'notifiedAt' => 0,
        'readAt' => 0,
        'adminUser' => null,
    ];

    /**
     * @param  \App\Models\AdminUserNotification $model
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
                'type' => $model->type,
                'data' => $model->data,
                'notifiedAt' => $model->notified_at,
                'readAt' => $model->read_at,
                'adminUser' => empty($model->adminUser) ? null : AdminUser::updateWithModel($model->adminUser),
            ];
            $response   = new static($modelArray, 200);
        }

        return $response;
    }
}
