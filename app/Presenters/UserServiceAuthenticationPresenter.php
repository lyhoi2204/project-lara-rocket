<?php

namespace App\Presenters;

use LaravelRocket\Foundation\Presenters\BasePresenter;

/**
 *
 * @property  \App\Models\UserServiceAuthentication $entity
 * @property  int $id
 * @property  string $name
 * @property  string $email
 * @property  string $service
 * @property  string $service_id
 * @property  string $image_url
 */

class UserServiceAuthenticationPresenter extends BasePresenter
{

    protected $multilingualFields = [
    ];

    protected $imageFields = [
    ];



    public function toString()
    {
        return $this->entity->present()->name;
    }


}
