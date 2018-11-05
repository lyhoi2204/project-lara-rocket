<?php

namespace Tests\Controllers\Api\Admin;

use Tests\TestCase;

class AdminUserRoleControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Http\Controllers\Api\Admin\AdminUserRoleController $controller */
        $controller = \App::make(\App\Http\Controllers\Api\Admin\AdminUserRoleController::class);
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
        $response = $this->action('GET', 'Api\Admin\AdminUserRoleController@index');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $adminUserRole = factory(\App\Models\AdminUserRole::class)->make();
        $this->action('POST', 'Api\Admin\AdminUserRoleController@store', $adminUserRole->toArray());
        $this->assertResponseStatus(201);
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $adminUserRole = factory(\App\Models\AdminUserRole::class)->create();

        $testData = str_random(10);
        $id = $adminUserRole->id;

        $adminUserRole->role = $testData;

        $this->action('PUT', 'Api\Admin\AdminUserRoleController@update', [$id], $adminUserRole->toArray());
        $this->assertResponseStatus(200);

        $newAdminUserRole = \App\Models\AdminUserRole::find($id);
        $this->assertEquals($testData, $newAdminUserRole->role);
    }

    public function testDeleteModel()
    {
        $adminUserRole = factory(\App\Models\AdminUserRole::class)->create();

        $id = $adminUserRole->id;

        $this->action('DELETE', 'Api\Admin\AdminUserRoleController@destroy', [$id]);
        $this->assertResponseStatus(200);

        $checkAdminUserRole = \App\Models\AdminUserRole::find($id);
        $this->assertNull($checkAdminUserRole);
    }

}
