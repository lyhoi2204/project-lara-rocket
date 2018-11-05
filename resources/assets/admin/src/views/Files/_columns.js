export default {
    "columns": {
        "id": {
            "name": "Id",
            "type": "text",
            "editable": false,
            "queryName": "id",
            "apiName": "id",
            "options": []
        },
        "url": {
            "name": "Url",
            "type": "text",
            "editable": true,
            "queryName": "url",
            "apiName": "url",
            "options": []
        },
        "title": {
            "name": "Title",
            "type": "text",
            "editable": true,
            "queryName": "title",
            "apiName": "title",
            "options": []
        },
        "entity_type": {
            "name": "Entity Type",
            "type": "select_single",
            "editable": true,
            "queryName": "entity_type",
            "apiName": "entityType",
            "options": []
        },
        "entity_id": {
            "name": "Entity Id",
            "type": "text",
            "editable": true,
            "queryName": "entity_id",
            "apiName": "entityId",
            "options": []
        },
        "storage_type": {
            "name": "Storage Type",
            "type": "select_single",
            "editable": true,
            "queryName": "storage_type",
            "apiName": "storageType",
            "options": [
                {
                    "name": "S3",
                    "value": "s3"
                },
                {
                    "name": "Local",
                    "value": "local"
                },
                {
                    "name": "URL",
                    "value": "url"
                }
            ]
        },
        "file_category_type": {
            "name": "File Category Type",
            "type": "select_single",
            "editable": true,
            "queryName": "file_category_type",
            "apiName": "fileCategoryType",
            "options": []
        },
        "file_type": {
            "name": "File Type",
            "type": "select_single",
            "editable": true,
            "queryName": "file_type",
            "apiName": "fileType",
            "options": [
                {
                    "name": "Image",
                    "value": "image"
                },
                {
                    "name": "Video",
                    "value": "video"
                }
            ]
        },
        "s3_key": {
            "name": "S3 Key",
            "type": "text",
            "editable": true,
            "queryName": "s3_key",
            "apiName": "s3Key",
            "options": []
        },
        "s3_bucket": {
            "name": "S3 Bucket",
            "type": "text",
            "editable": true,
            "queryName": "s3_bucket",
            "apiName": "s3Bucket",
            "options": []
        },
        "s3_region": {
            "name": "S3 Region",
            "type": "text",
            "editable": true,
            "queryName": "s3_region",
            "apiName": "s3Region",
            "options": []
        },
        "s3_extension": {
            "name": "S3 Extension",
            "type": "text",
            "editable": true,
            "queryName": "s3_extension",
            "apiName": "s3Extension",
            "options": []
        },
        "media_type": {
            "name": "Media Type",
            "type": "select_single",
            "editable": true,
            "queryName": "media_type",
            "apiName": "mediaType",
            "options": []
        },
        "format": {
            "name": "Format",
            "type": "text",
            "editable": true,
            "queryName": "format",
            "apiName": "format",
            "options": []
        },
        "original_file_name": {
            "name": "Original File Name",
            "type": "text",
            "editable": true,
            "queryName": "original_file_name",
            "apiName": "originalFileName",
            "options": []
        },
        "file_size": {
            "name": "File Size",
            "type": "text",
            "editable": true,
            "queryName": "file_size",
            "apiName": "fileSize",
            "options": []
        },
        "width": {
            "name": "Width",
            "type": "text",
            "editable": true,
            "queryName": "width",
            "apiName": "width",
            "options": []
        },
        "height": {
            "name": "Height",
            "type": "text",
            "editable": true,
            "queryName": "height",
            "apiName": "height",
            "options": []
        },
        "thumbnails": {
            "name": "Thumbnails",
            "type": "textarea",
            "editable": true,
            "queryName": "thumbnails",
            "apiName": "thumbnails",
            "options": []
        },
        "dominant_color": {
            "name": "Dominant Color",
            "type": "text",
            "editable": true,
            "queryName": "dominant_color",
            "apiName": "dominantColor",
            "options": []
        },
        "is_enabled": {
            "name": "Is Enabled",
            "type": "boolean",
            "editable": true,
            "queryName": "is_enabled",
            "apiName": "isEnabled",
            "options": []
        },
        "created_at": {
            "name": "Created At",
            "type": "datetime",
            "editable": false,
            "queryName": "created_at",
            "apiName": "createdAt",
            "options": []
        },
        "updated_at": {
            "name": "Updated At",
            "type": "datetime",
            "editable": false,
            "queryName": "updated_at",
            "apiName": "updatedAt",
            "options": []
        }
    },
    "list": [
        "id",
        "url",
        "title",
        "entity_type",
        "entity_id",
        "storage_type",
        "file_category_type",
        "file_type",
        "s3_key",
        "s3_bucket",
        "s3_region",
        "s3_extension",
        "media_type",
        "format",
        "original_file_name",
        "file_size",
        "width",
        "height",
        "dominant_color",
        "is_enabled"
    ],
    "show": [
        "id",
        "url",
        "title",
        "entity_type",
        "entity_id",
        "storage_type",
        "file_category_type",
        "file_type",
        "s3_key",
        "s3_bucket",
        "s3_region",
        "s3_extension",
        "media_type",
        "format",
        "original_file_name",
        "file_size",
        "width",
        "height",
        "thumbnails",
        "dominant_color",
        "is_enabled",
        "created_at",
        "updated_at"
    ],
    "edit": [
        "url",
        "title",
        "entity_type",
        "entity_id",
        "storage_type",
        "file_category_type",
        "file_type",
        "s3_key",
        "s3_bucket",
        "s3_region",
        "s3_extension",
        "media_type",
        "format",
        "original_file_name",
        "file_size",
        "width",
        "height",
        "thumbnails",
        "dominant_color",
        "is_enabled"
    ],
    "relations": []
};
