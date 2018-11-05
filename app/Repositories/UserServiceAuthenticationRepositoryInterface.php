<?php

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\SingleKeyModelRepositoryInterface;
/**
 *
 * @method \App\Models\UserServiceAuthentication[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\UserServiceAuthentication[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\UserServiceAuthentication[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\UserServiceAuthentication create($value)
 * @method \App\Models\UserServiceAuthentication find($id)
 * @method \App\Models\UserServiceAuthentication[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\UserServiceAuthentication[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\UserServiceAuthentication update($model, $input)
 * @method \App\Models\UserServiceAuthentication save($model);
 * @method \App\Models\UserServiceAuthentication firstByFilter($filter);
 * @method \App\Models\UserServiceAuthentication[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\UserServiceAuthentication[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface UserServiceAuthenticationRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    /**
     * @return  \App\Models\UserServiceAuthentication
     */
    public function getBlankModel();


}
