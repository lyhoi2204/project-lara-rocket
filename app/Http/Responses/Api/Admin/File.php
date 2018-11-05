<?php

namespace App\Http\Responses\Api\Admin;

class File extends Response
{
    protected $columns = [
        'id' => 0,
        'url' => '',
        'title' => null,
        'entityType' => '',
        'entityId' => 0,
        'storageType' => '',
        'fileCategoryType' => '',
        'fileType' => '',
        's3Key' => '',
        's3Bucket' => '',
        's3Region' => '',
        's3Extension' => '',
        'mediaType' => '',
        'format' => '',
        'originalFileName' => '',
        'fileSize' => 0,
        'width' => 0,
        'height' => 0,
        'thumbnails' => null,
        'dominantColor' => '',
        'isEnabled' => 1,
        'createdAt' => null,
        'updatedAt' => null,
    ];

    /**
     * @param  \App\Models\File $model
     *
     * @return  static
     */
    public static function updateWithModel($model)
    {
        $response = new static([], 400);
        if(!empty($model)) {
            $modelArray = [
                'id' => $model->id,
                'url' => $model->url,
                'title' => $model->title,
                'entityType' => $model->entity_type,
                'entityId' => $model->entity_id,
                'storageType' => $model->storage_type,
                'fileCategoryType' => $model->file_category_type,
                'fileType' => $model->file_type,
                's3Key' => $model->s3_key,
                's3Bucket' => $model->s3_bucket,
                's3Region' => $model->s3_region,
                's3Extension' => $model->s3_extension,
                'mediaType' => $model->media_type,
                'format' => $model->format,
                'originalFileName' => $model->original_file_name,
                'fileSize' => $model->file_size,
                'width' => $model->width,
                'height' => $model->height,
                'thumbnails' => $model->thumbnails,
                'dominantColor' => $model->dominant_color,
                'isEnabled' => $model->is_enabled,
                'createdAt' => $model->created_at ? $model->created_at->timestamp : null,
                'updatedAt' => $model->updated_at ? $model->updated_at->timestamp : null,
            ];
            $response   = new static($modelArray, 200);
        }

        return $response;
    }
}
