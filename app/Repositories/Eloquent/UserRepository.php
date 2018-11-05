<?php

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\AuthenticatableRepository;
use App\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends AuthenticatableRepository implements UserRepositoryInterface
{

    protected $querySearchTargets = [
        'name',
    ];

    public function getBlankModel()
{
    return new User();
}

    public function rules()
{
    return [];
}

    public function messages()
{
    return [];
}

protected function buildQueryByFilter($query, $filter)
{
    if (array_key_exists('query', $filter)) {
        $searchWord = array_get($filter, 'query');
        if (!empty($searchWord)) {
            $query = $query->where(function ($q) use($searchWord) {
                $q->where('name', 'LIKE', '%' . $searchWord . '%');
            });
            unset($filter['query']);
        }
    }
    return parent::buildQueryByFilter($query, $filter);
}

}
