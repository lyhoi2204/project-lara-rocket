<?php

namespace App\Http\Controllers\Api\Admin;

use App\Exceptions\Api\Admin\APIErrorException;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Admin\AdminUserNotification\IndexRequest;
use App\Http\Requests\Api\Admin\AdminUserNotification\StoreRequest;
use App\Http\Requests\Api\Admin\AdminUserNotification\UpdateRequest;
use App\Http\Responses\Api\Admin\AdminUserNotification;
use App\Http\Responses\Api\Admin\AdminUserNotifications;
use App\Http\Responses\Api\Admin\Status;
use App\Repositories\AdminUserNotificationRepositoryInterface;
use App\Services\AdminUserServiceInterface;
use App\Services\FileServiceInterface;

class AdminUserNotificationController extends Controller
{
    /** @var  \App\Repositories\AdminUserNotificationRepositoryInterface */
    protected $adminUserNotificationRepository;

    /** @var  \App\Services\AdminUserServiceInterface $adminUserServicee */
    protected $adminUserService;

    /** @var  \App\Services\FileServiceInterface $fileService */
    protected $fileService;

    public function __construct(
        AdminUserNotificationRepositoryInterface $adminUserNotificationRepository,
        FileServiceInterface $fileService,
        AdminUserServiceInterface $adminUserService
    ) {
        $this->adminUserNotificationRepository = $adminUserNotificationRepository;
        $this->adminUserService    = $adminUserService;
        $this->fileService         = $fileService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  IndexRequest $request
     *
     * @return  \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        $offset    = $request->offset();
        $limit     = $request->limit();
        $order     = $request->order();
        $direction = $request->direction();

        $queryWord = $request->get('query');
        $filter    = [];
        if (!empty($queryWord)) {
            $filter['query'] = $queryWord;
        }

        $count      = $this->adminUserNotificationRepository->count();
        $adminUserNotifications = $this->adminUserNotificationRepository->getByFilter($filter, $order, $direction, $offset, $limit);

        return AdminUserNotifications::updateListWithModel($adminUserNotifications, $offset, $limit, $count)->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    StoreRequest $request
     *
     * @throws  APIErrorException
     *
     * @return  \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $input = $request->only([
            'type',
            'data',
            'notified_at',
            'read_at',
            'admin_user_id',
        ]);


        $adminUserNotification = $this->adminUserNotificationRepository->create($input);

        if (empty($adminUserNotification)) {
            throw new APIErrorException('unknown', 'AdminUserNotification Creation Failed');
        }

        return AdminUserNotification::updateWithModel($adminUserNotification)->withStatus(201)->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @throws  APIErrorException
     *
     * @return  \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $adminUserNotification = $this->adminUserNotificationRepository->find($id);
        if (empty($adminUserNotification)) {
            throw new APIErrorException('notFound', 'AdminUserNotification not found');
        }

        return AdminUserNotification::updateWithModel($adminUserNotification)->response();
    }

    /**
     * @param  int                                                   $id
     * @param  UpdateRequest $request
     *
     * @return  \Illuminate\Http\JsonResponse
     *
     * @throws  \App\Exceptions\Api\Admin\APIErrorException
     */
    public function update($id, UpdateRequest $request)
    {
        $adminUserNotification = $this->adminUserNotificationRepository->find($id);
        if (empty($adminUserNotification)) {
            throw new APIErrorException('notFound', 'AdminUserNotification not found');
        }

        $input = $request->only([
        'type',
        'data',
        'notified_at',
        'read_at',
        'admin_user_id',
        ]);



        $adminUserNotification = $this->adminUserNotificationRepository->update($adminUserNotification, $input);

        return AdminUserNotification::updateWithModel($adminUserNotification)->response();
    }

    /**
     * @param  int $id
     *
     * @return  \Illuminate\Http\JsonResponse
     *
     * @throws  \App\Exceptions\Api\Admin\APIErrorException
     */
    public function destroy($id)
    {
        $adminUserNotification = $this->adminUserNotificationRepository->find($id);
        if (empty($adminUserNotification)) {
            throw new APIErrorException('notFound', 'AdminUserNotification not found');
        }

        $this->adminUserNotificationRepository->delete($adminUserNotification);

        return Status::ok()->response();
    }
}
