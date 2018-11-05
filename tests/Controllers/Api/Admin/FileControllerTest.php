<?php

namespace Tests\Controllers\Api\Admin;

use Tests\TestCase;

class FileControllerTest extends TestCase
{

    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Http\Controllers\Api\Admin\FileController $controller */
        $controller = \App::make(\App\Http\Controllers\Api\Admin\FileController::class);
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
        $response = $this->action('GET', 'Api\Admin\FileController@index');
        $this->assertResponseOk();
    }

    public function testStoreModel()
    {
        $file = factory(\App\Models\File::class)->make();
        $this->action('POST', 'Api\Admin\FileController@store', $file->toArray());
        $this->assertResponseStatus(201);
    }

    public function testUpdateModel()
    {
        $faker = \Faker\Factory::create();

        $file = factory(\App\Models\File::class)->create();

        $testData = str_random(10);
        $id = $file->id;

        $file->url = $testData;

        $this->action('PUT', 'Api\Admin\FileController@update', [$id], $file->toArray());
        $this->assertResponseStatus(200);

        $newFile = \App\Models\File::find($id);
        $this->assertEquals($testData, $newFile->url);
    }

    public function testDeleteModel()
    {
        $file = factory(\App\Models\File::class)->create();

        $id = $file->id;

        $this->action('DELETE', 'Api\Admin\FileController@destroy', [$id]);
        $this->assertResponseStatus(200);

        $checkFile = \App\Models\File::find($id);
        $this->assertNull($checkFile);
    }

}
