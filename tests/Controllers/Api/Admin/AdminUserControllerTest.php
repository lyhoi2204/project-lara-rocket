<?php

namespace Tests\Controllers\Api\Admin;

use Tests\TestCase;

class AdminUserControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Http\Controllers\Api\Admin\AdminUserController $controller */
        $controller = \App::make(\App\Http\Controllers\Api\Admin\AdminUserController::class);
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
        $response = $this->action('GET', 'Api\Admin\AdminUserController@index');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $adminUser = factory(\App\Models\AdminUser::class)->make();
        $this->action('POST', 'Api\Admin\AdminUserController@store', $adminUser->toArray());
        $this->assertResponseStatus(201);
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $adminUser = factory(\App\Models\AdminUser::class)->create();

        $testData = str_random(10);
        $id = $adminUser->id;

        $adminUser->name = $testData;

        $this->action('PUT', 'Api\Admin\AdminUserController@update', [$id], $adminUser->toArray());
        $this->assertResponseStatus(200);

        $newAdminUser = \App\Models\AdminUser::find($id);
        $this->assertEquals($testData, $newAdminUser->name);
    }

    public function testDeleteModel()
    {
        $adminUser = factory(\App\Models\AdminUser::class)->create();

        $id = $adminUser->id;

        $this->action('DELETE', 'Api\Admin\AdminUserController@destroy', [$id]);
        $this->assertResponseStatus(200);

        $checkAdminUser = \App\Models\AdminUser::find($id);
        $this->assertNull($checkAdminUser);
    }

}
