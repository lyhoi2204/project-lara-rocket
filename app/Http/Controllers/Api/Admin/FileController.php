<?php

namespace App\Http\Controllers\Api\Admin;

use App\Exceptions\Api\Admin\APIErrorException;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Admin\File\IndexRequest;
use App\Http\Requests\Api\Admin\File\StoreRequest;
use App\Http\Requests\Api\Admin\File\UpdateRequest;
use App\Http\Responses\Api\Admin\File;
use App\Http\Responses\Api\Admin\Files;
use App\Http\Responses\Api\Admin\Status;
use App\Repositories\FileRepositoryInterface;
use App\Services\AdminUserServiceInterface;
use App\Services\FileServiceInterface;

class FileController extends Controller
{
    /** @var  \App\Repositories\FileRepositoryInterface */
    protected $fileRepository;

    /** @var  \App\Services\AdminUserServiceInterface $adminUserServicee */
    protected $adminUserService;

    /** @var  \App\Services\FileServiceInterface $fileService */
    protected $fileService;

    public function __construct(
        FileRepositoryInterface $fileRepository,
        FileServiceInterface $fileService,
        AdminUserServiceInterface $adminUserService
    ) {
        $this->fileRepository = $fileRepository;
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

        $count      = $this->fileRepository->count();
        $files = $this->fileRepository->getByFilter($filter, $order, $direction, $offset, $limit);

        return Files::updateListWithModel($files, $offset, $limit, $count)->response();
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
            'url',
            'title',
            'entity_type',
            'entity_id',
            'storage_type',
            'file_category_type',
            'file_type',
            's3_key',
            's3_bucket',
            's3_region',
            's3_extension',
            'media_type',
            'format',
            'original_file_name',
            'file_size',
            'width',
            'height',
            'thumbnails',
            'dominant_color',
            'is_enabled',
        ]);


        $file = $this->fileRepository->create($input);

        if (empty($file)) {
            throw new APIErrorException('unknown', 'File Creation Failed');
        }

        return File::updateWithModel($file)->withStatus(201)->response();
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
        $file = $this->fileRepository->find($id);
        if (empty($file)) {
            throw new APIErrorException('notFound', 'File not found');
        }

        return File::updateWithModel($file)->response();
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
        $file = $this->fileRepository->find($id);
        if (empty($file)) {
            throw new APIErrorException('notFound', 'File not found');
        }

        $input = $request->only([
        'url',
        'title',
        'entity_type',
        'entity_id',
        'storage_type',
        'file_category_type',
        'file_type',
        's3_key',
        's3_bucket',
        's3_region',
        's3_extension',
        'media_type',
        'format',
        'original_file_name',
        'file_size',
        'width',
        'height',
        'thumbnails',
        'dominant_color',
        'is_enabled',
        ]);



        $file = $this->fileRepository->update($file, $input);

        return File::updateWithModel($file)->response();
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
        $file = $this->fileRepository->find($id);
        if (empty($file)) {
            throw new APIErrorException('notFound', 'File not found');
        }

        $this->fileRepository->delete($file);

        return Status::ok()->response();
    }
}
