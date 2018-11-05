<?php

namespace App\Http\Controllers\Api\Admin;

use App\Exceptions\Api\Admin\APIErrorException;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Admin\AdminUserRole\IndexRequest;
use App\Http\Requests\Api\Admin\AdminUserRole\StoreRequest;
use App\Http\Requests\Api\Admin\AdminUserRole\UpdateRequest;
use App\Http\Responses\Api\Admin\AdminUserRole;
use App\Http\Responses\Api\Admin\AdminUserRoles;
use App\Http\Responses\Api\Admin\Status;
use App\Repositories\AdminUserRoleRepositoryInterface;
use App\Services\AdminUserServiceInterface;
use App\Services\FileServiceInterface;

class AdminUserRoleController extends Controller
{
    /** @var  \App\Repositories\AdminUserRoleRepositoryInterface */
    protected $adminUserRoleRepository;

    /** @var  \App\Services\AdminUserServiceInterface $adminUserServicee */
    protected $adminUserService;

    /** @var  \App\Services\FileServiceInterface $fileService */
    protected $fileService;

    public function __construct(
        AdminUserRoleRepositoryInterface $adminUserRoleRepository,
        FileServiceInterface $fileService,
        AdminUserServiceInterface $adminUserService
    ) {
        $this->adminUserRoleRepository = $adminUserRoleRepository;
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

        $count      = $this->adminUserRoleRepository->count();
        $adminUserRoles = $this->adminUserRoleRepository->getByFilter($filter, $order, $direction, $offset, $limit);

        return AdminUserRoles::updateListWithModel($adminUserRoles, $offset, $limit, $count)->response();
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
            'role',
            'admin_user_id',
        ]);


        $adminUserRole = $this->adminUserRoleRepository->create($input);

        if (empty($adminUserRole)) {
            throw new APIErrorException('unknown', 'AdminUserRole Creation Failed');
        }

        return AdminUserRole::updateWithModel($adminUserRole)->withStatus(201)->response();
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
        $adminUserRole = $this->adminUserRoleRepository->find($id);
        if (empty($adminUserRole)) {
            throw new APIErrorException('notFound', 'AdminUserRole not found');
        }

        return AdminUserRole::updateWithModel($adminUserRole)->response();
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
        $adminUserRole = $this->adminUserRoleRepository->find($id);
        if (empty($adminUserRole)) {
            throw new APIErrorException('notFound', 'AdminUserRole not found');
        }

        $input = $request->only([
        'role',
        'admin_user_id',
        ]);



        $adminUserRole = $this->adminUserRoleRepository->update($adminUserRole, $input);

        return AdminUserRole::updateWithModel($adminUserRole)->response();
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
        $adminUserRole = $this->adminUserRoleRepository->find($id);
        if (empty($adminUserRole)) {
            throw new APIErrorException('notFound', 'AdminUserRole not found');
        }

        $this->adminUserRoleRepository->delete($adminUserRole);

        return Status::ok()->response();
    }
}
