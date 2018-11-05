<?php

namespace App\Repositories;

use LaravelRocket\Foundation\Repositories\SingleKeyModelRepositoryInterface;
/**
 *
 * @method \App\Models\File[]|\Illuminate\Database\Eloquent\Collection getEmptyList()
 * @method \App\Models\File[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection all($order = null, $direction = null)
 * @method \App\Models\File[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection get($order, $direction, $offset, $limit, $before = 0)
 * @method \App\Models\File create($value)
 * @method \App\Models\File find($id)
 * @method \App\Models\File[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByIds($ids, $order = null, $direction = null, $reorder = false)
 * @method \App\Models\File[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByIds($ids, $order = null, $direction = null, $offset = null, $limit = null);
 * @method \App\Models\File update($model, $input)
 * @method \App\Models\File save($model);
 * @method \App\Models\File firstByFilter($filter);
 * @method \App\Models\File[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection getByFilter($filter,$order = null, $direction = null, $offset = null, $limit = null, $before = 0);
 * @method \App\Models\File[]|\Traversable|array|\Illuminate\Database\Eloquent\Collection allByFilter($filter,$order = null, $direction = null);
 */

interface FileRepositoryInterface extends SingleKeyModelRepositoryInterface
{
    /**
     * @return  \App\Models\File
     */
    public function getBlankModel();


}
