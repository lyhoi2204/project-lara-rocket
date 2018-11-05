<?php

namespace Tests\Controllers\Api\Admin;

use Tests\TestCase;

class UserServiceAuthenticationControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Http\Controllers\Api\Admin\UserServiceAuthenticationController $controller */
        $controller = \App::make(\App\Http\Controllers\Api\Admin\UserServiceAuthenticationController::class);
        $this->assertNotNull($controller);
    }

    public function setUp()
    {
        parent::setUp();
        $authUser = factory(\App\Models\AdminUser::class)->create();
        $authUserRole = factory(\App\Models\AdminUserRole::class)->create([
            'admin_user_id' => $authUser->id,
            'role' => \App\Models\AdminUserRole::ROLE_SUPER_USER,
        ]);
        $this->be($authUser, 'admins');
    }

    public function testGetList()
    {
        $response = $this->action('GET', 'Api\Admin\UserServiceAuthenticationController@index');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $userServiceAuthentication = factory(\App\Models\UserServiceAuthentication::class)->make();
        $this->action('POST', 'Api\Admin\UserServiceAuthenticationController@store', $userServiceAuthentication->toArray());
        $this->assertResponseStatus(201);
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $userServiceAuthentication = factory(\App\Models\UserServiceAuthentication::class)->create();

        $testData = str_random(10);
        $id = $userServiceAuthentication->id;

        $userServiceAuthentication->name = $testData;

        $this->action('PUT', 'Api\Admin\UserServiceAuthenticationController@update', [$id], $userServiceAuthentication->toArray());
        $this->assertResponseStatus(200);

        $newUserServiceAuthentication = \App\Models\UserServiceAuthentication::find($id);
        $this->assertEquals($testData, $newUserServiceAuthentication->name);
    }

    public function testDeleteModel()
    {
        $userServiceAuthentication = factory(\App\Models\UserServiceAuthentication::class)->create();

        $id = $userServiceAuthentication->id;

        $this->action('DELETE', 'Api\Admin\UserServiceAuthenticationController@destroy', [$id]);
        $this->assertResponseStatus(200);

        $checkUserServiceAuthentication = \App\Models\UserServiceAuthentication::find($id);
        $this->assertNull($checkUserServiceAuthentication);
    }

}
