<?php

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\AuthenticatableRepositoryInterface;
/**
 *
 * @method \App\Models\User[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\User[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\User[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\User create($value)
 * @method \App\Models\User find($id)
 * @method \App\Models\User[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\User[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\User update($model, $input)
 * @method \App\Models\User save($model);
 * @method \App\Models\User firstByFilter($filter);
 * @method \App\Models\User[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\User[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface UserRepositoryInterface extends AuthenticatableRepositoryInterface
{
    /**
     * @return  \App\Models\User
     */
    public function getBlankModel();


}
