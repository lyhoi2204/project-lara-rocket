<?php

namespace Tests\Controllers\Api\Admin;

use Tests\TestCase;

class AdminUserNotificationControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Http\Controllers\Api\Admin\AdminUserNotificationController $controller */
        $controller = \App::make(\App\Http\Controllers\Api\Admin\AdminUserNotificationController::class);
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
        $response = $this->action('GET', 'Api\Admin\AdminUserNotificationController@index');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $adminUserNotification = factory(\App\Models\AdminUserNotification::class)->make();
        $this->action('POST', 'Api\Admin\AdminUserNotificationController@store', $adminUserNotification->toArray());
        $this->assertResponseStatus(201);
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $adminUserNotification = factory(\App\Models\AdminUserNotification::class)->create();

        $testData = str_random(10);
        $id = $adminUserNotification->id;

        $adminUserNotification->type = $testData;

        $this->action('PUT', 'Api\Admin\AdminUserNotificationController@update', [$id], $adminUserNotification->toArray());
        $this->assertResponseStatus(200);

        $newAdminUserNotification = \App\Models\AdminUserNotification::find($id);
        $this->assertEquals($testData, $newAdminUserNotification->type);
    }

    public function testDeleteModel()
    {
        $adminUserNotification = factory(\App\Models\AdminUserNotification::class)->create();

        $id = $adminUserNotification->id;

        $this->action('DELETE', 'Api\Admin\AdminUserNotificationController@destroy', [$id]);
        $this->assertResponseStatus(200);

        $checkAdminUserNotification = \App\Models\AdminUserNotification::find($id);
        $this->assertNull($checkAdminUserNotification);
    }

}
