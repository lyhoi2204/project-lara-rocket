<?php

namespace Tests\Repositories;

use App\Models\AdminUserNotification;
use Tests\TestCase;

class AdminUserNotificationRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var    \App\Repositories\AdminUserNotificationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AdminUserNotificationRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $models = factory(AdminUserNotification::class, 3)->create();
        $adminUserNotificationIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\AdminUserNotificationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AdminUserNotificationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $modelsCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(AdminUserNotification::class, $modelsCheck[0]);

        $modelsCheck = $repository->getByIds($adminUserNotificationIds);
        $this->assertEquals(3, count($modelsCheck));
    }

    public function testFind()
    {
        $models = factory(AdminUserNotification::class, 3)->create();
        $adminUserNotificationIds = $models->pluck('id')->toArray();

        /** @var    \App\Repositories\AdminUserNotificationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AdminUserNotificationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $adminUserNotificationCheck = $repository->find($adminUserNotificationIds[0]);
        $this->assertEquals($adminUserNotificationIds[0], $adminUserNotificationCheck->id);
    }

    public function testCreate()
    {
        $adminUserNotificationData = factory(AdminUserNotification::class)->make();

        /** @var    \App\Repositories\AdminUserNotificationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AdminUserNotificationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $adminUserNotificationCheck = $repository->create($adminUserNotificationData->toFillableArray());
        $this->assertNotNull($adminUserNotificationCheck);
    }

    public function testUpdate()
    {
        $adminUserNotificationData = factory(AdminUserNotification::class)->create();

        /** @var    \App\Repositories\AdminUserNotificationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AdminUserNotificationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $adminUserNotificationData = factory(AdminUserNotification::class)->make();

        $adminUserNotificationCheck = $repository->update($adminUserNotificationData, $adminUserNotificationData->toFillableArray());
        $this->assertNotNull($adminUserNotificationCheck);
    }

    public function testDelete()
    {
        $adminUserNotificationData = factory(AdminUserNotification::class)->create();

        /** @var    \App\Repositories\AdminUserNotificationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\AdminUserNotificationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($adminUserNotificationData);

        $adminUserNotificationCheck = $repository->find($adminUserNotificationData->id);
        $this->assertNull($adminUserNotificationCheck);
    }

}
