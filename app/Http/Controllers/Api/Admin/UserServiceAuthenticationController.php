<?php

namespace App\Http\Controllers\Api\Admin;

use App\Exceptions\Api\Admin\APIErrorException;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Admin\UserServiceAuthentication\IndexRequest;
use App\Http\Requests\Api\Admin\UserServiceAuthentication\StoreRequest;
use App\Http\Requests\Api\Admin\UserServiceAuthentication\UpdateRequest;
use App\Http\Responses\Api\Admin\UserServiceAuthentication;
use App\Http\Responses\Api\Admin\UserServiceAuthentications;
use App\Http\Responses\Api\Admin\Status;
use App\Repositories\UserServiceAuthenticationRepositoryInterface;
use App\Services\AdminUserServiceInterface;
use App\Services\FileServiceInterface;

class UserServiceAuthenticationController extends Controller
{
    /** @var  \App\Repositories\UserServiceAuthenticationRepositoryInterface */
    protected $userServiceAuthenticationRepository;

    /** @var  \App\Services\AdminUserServiceInterface $adminUserServicee */
    protected $adminUserService;

    /** @var  \App\Services\FileServiceInterface $fileService */
    protected $fileService;

    public function __construct(
        UserServiceAuthenticationRepositoryInterface $userServiceAuthenticationRepository,
        FileServiceInterface $fileService,
        AdminUserServiceInterface $adminUserService
    ) {
        $this->userServiceAuthenticationRepository = $userServiceAuthenticationRepository;
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

        $count      = $this->userServiceAuthenticationRepository->count();
        $userServiceAuthentications = $this->userServiceAuthenticationRepository->getByFilter($filter, $order, $direction, $offset, $limit);

        return UserServiceAuthentications::updateListWithModel($userServiceAuthentications, $offset, $limit, $count)->response();
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
            'service',
            'service_id',
            'image_url',
        ]);


        $userServiceAuthentication = $this->userServiceAuthenticationRepository->create($input);

        if (empty($userServiceAuthentication)) {
            throw new APIErrorException('unknown', 'UserServiceAuthentication Creation Failed');
        }

        return UserServiceAuthentication::updateWithModel($userServiceAuthentication)->withStatus(201)->response();
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
        $userServiceAuthentication = $this->userServiceAuthenticationRepository->find($id);
        if (empty($userServiceAuthentication)) {
            throw new APIErrorException('notFound', 'UserServiceAuthentication not found');
        }

        return UserServiceAuthentication::updateWithModel($userServiceAuthentication)->response();
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
        $userServiceAuthentication = $this->userServiceAuthenticationRepository->find($id);
        if (empty($userServiceAuthentication)) {
            throw new APIErrorException('notFound', 'UserServiceAuthentication not found');
        }

        $input = $request->only([
        'name',
        'email',
        'service',
        'service_id',
        'image_url',
        ]);



        $userServiceAuthentication = $this->userServiceAuthenticationRepository->update($userServiceAuthentication, $input);

        return UserServiceAuthentication::updateWithModel($userServiceAuthentication)->response();
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
        $userServiceAuthentication = $this->userServiceAuthenticationRepository->find($id);
        if (empty($userServiceAuthentication)) {
            throw new APIErrorException('notFound', 'UserServiceAuthentication not found');
        }

        $this->userServiceAuthenticationRepository->delete($userServiceAuthentication);

        return Status::ok()->response();
    }
}
