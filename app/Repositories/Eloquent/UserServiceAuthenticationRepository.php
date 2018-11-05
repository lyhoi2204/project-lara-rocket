<?php

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\UserServiceAuthenticationRepositoryInterface;
use App\Models\UserServiceAuthentication;

class UserServiceAuthenticationRepository extends SingleKeyModelRepository implements UserServiceAuthenticationRepositoryInterface
{

    protected $querySearchTargets = [
        'name',
    ];

    public function getBlankModel()
{
    return new UserServiceAuthentication();
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

        return parent::buildQueryByFilter($query, $filter);
    }

}
