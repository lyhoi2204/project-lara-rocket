<?php

namespace App\Repositories\Eloquent;

use LaravelRocket\Foundation\Repositories\Eloquent\SingleKeyModelRepository;
use App\Repositories\AdminUserRoleRepositoryInterface;
use App\Models\AdminUserRole;

class AdminUserRoleRepository extends SingleKeyModelRepository implements AdminUserRoleRepositoryInterface
{

    protected $querySearchTargets = [
    ];

    public function getBlankModel()
{
    return new AdminUserRole();
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
