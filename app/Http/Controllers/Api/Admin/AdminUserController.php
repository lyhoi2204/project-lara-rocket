<?php

namespace App\Http\Controllers\Api\Admin;

use App\Exceptions\Api\Admin\APIErrorException;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Admin\AdminUser\IndexRequest;
use App\Http\Requests\Api\Admin\AdminUser\StoreRequest;
use App\Http\Requests\Api\Admin\AdminUser\UpdateRequest;
use App\Http\Responses\Api\Admin\AdminUser;
use App\Http\Responses\Api\Admin\AdminUsers;
use App\Http\Responses\Api\Admin\Status;
use App\Repositories\AdminUserRepositoryInterface;
use App\Services\AdminUserServiceInterface;
use App\Services\FileServiceInterface;

class AdminUserController extends Controller
{
    /** @var  \App\Repositories\AdminUserRepositoryInterface */
    protected $adminUserRepository;

    /** @var  \App\Services\AdminUserServiceInterface $adminUserServicee */
    protected $adminUserService;

    /** @var  \App\Services\FileServiceInterface $fileService */
    protected $fileService;

    public function __construct(
        AdminUserRepositoryInterface $adminUserRepository,
        FileServiceInterface $fileService,
        AdminUserServiceInterface $adminUserService
    ) {
        $this->adminUserRepository = $adminUserRepository;
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

        $count      = $this->adminUserRepository->count();
        $adminUsers = $this->adminUserRepository->getByFilter($filter, $order, $direction, $offset, $limit);

        return AdminUsers::updateListWithModel($adminUsers, $offset, $limit, $count)->response();
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
            'name',
            'email',
            'password',
            'id',
        ]);

        if ($request->hasFile('profile_image')) {
            $file      = $request->file('profile_image');
            $mediaType = $file->getClientMimeType();
            $path      = $file->getPathname();
            $fileModel     = $this->fileService->upload('default-image', $path, $mediaType, []);
            if (!empty($fileModel)) {
                $input['profile_image_id'] = $fileModel->id;
            }
        }

        $adminUser = $this->adminUserRepository->create($input);

        if (empty($adminUser)) {
            throw new APIErrorException('unknown', 'AdminUser Creation Failed');
        }

        return AdminUser::updateWithModel($adminUser)->withStatus(201)->response();
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
        $adminUser = $this->adminUserRepository->find($id);
        if (empty($adminUser)) {
            throw new APIErrorException('notFound', 'AdminUser not found');
        }

        return AdminUser::updateWithModel($adminUser)->response();
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
        $adminUser = $this->adminUserRepository->find($id);
        if (empty($adminUser)) {
            throw new APIErrorException('notFound', 'AdminUser not found');
        }

        $input = $request->only([
        'name',
        'email',
        'password',
        'id',
        ]);


        if ($request->hasFile('profile_image')) {
            $file      = $request->file('profile_image');
            $mediaType = $file->getClientMimeType();
            $path      = $file->getPathname();
            $fileModel     = $this->fileService->upload('default-image', $path, $mediaType, []);
            if (!empty($fileModel)) {
                if (!empty($adminUser->profileImage)) {
                    $this->fileService->delete($adminUser->profileImage);
                }
                $input['profile_image_id'] = $fileModel->id;
            }
        }

        $adminUser = $this->adminUserRepository->update($adminUser, $input);

        return AdminUser::updateWithModel($adminUser)->response();
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
        $adminUser = $this->adminUserRepository->find($id);
        if (empty($adminUser)) {
            throw new APIErrorException('notFound', 'AdminUser not found');
        }

        $this->adminUserRepository->delete($adminUser);

        return Status::ok()->response();
    }
}
