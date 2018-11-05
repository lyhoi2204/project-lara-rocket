<?php

namespace App\Presenters;

use LaravelRocket\Foundation\Presenters\BasePresenter;

/**
 *
 * @property  \App\Models\AdminUserNotification $entity
 * @property  int $id
 * @property  int $admin_user_id
 * @property  string $type
 * @property  string $data
 * @property  int $notified_at
 * @property  int $read_at
 */

class AdminUserNotificationPresenter extends BasePresenter
{

    protected $multilingualFields = [
    ];

    protected $imageFields = [
    ];

    public function adminUser()
    {
        $model = $this->entity->adminUser;
        if (!$model) {
            $model      = new \App\Models\AdminUser();
        }
        return $model;
    }


    public function toString()
    {
        return $this->entity->present()->id;
    }


}
