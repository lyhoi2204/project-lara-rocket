<?php

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\AuthenticatableRepositoryInterface;
/**
 *
 * @method \App\Models\AdminUser[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\AdminUser[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\AdminUser[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\AdminUser create($value)
 * @method \App\Models\AdminUser find($id)
 * @method \App\Models\AdminUser[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\AdminUser[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\AdminUser update($model, $input)
 * @method \App\Models\AdminUser save($model);
 * @method \App\Models\AdminUser firstByFilter($filter);
 * @method \App\Models\AdminUser[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\AdminUser[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface AdminUserRepositoryInterface extends AuthenticatableRepositoryInterface
{
    /**
     * @return  \App\Models\AdminUser
     */
    public function getBlankModel();


}
