<?php

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\SingleKeyModelRepositoryInterface;
/**
 *
 * @method \App\Models\AdminUserNotification[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\AdminUserNotification[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\AdminUserNotification[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\AdminUserNotification create($value)
 * @method \App\Models\AdminUserNotification find($id)
 * @method \App\Models\AdminUserNotification[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\AdminUserNotification[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\AdminUserNotification update($model, $input)
 * @method \App\Models\AdminUserNotification save($model);
 * @method \App\Models\AdminUserNotification firstByFilter($filter);
 * @method \App\Models\AdminUserNotification[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\AdminUserNotification[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface AdminUserNotificationRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    /**
     * @return  \App\Models\AdminUserNotification
     */
    public function getBlankModel();


}
