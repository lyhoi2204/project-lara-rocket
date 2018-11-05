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
        "admin_user_id": {
            "name": "Admin User Id",
            "type": "select_single",
            "editable": true,
            "queryName": "admin_user_id",
            "apiName": "adminUserId",
            "options": [],
            "relation": "adminUser"
        },
        "role": {
            "name": "Role",
            "type": "select_single",
            "editable": true,
            "queryName": "role",
            "apiName": "role",
            "options": [
                {
                    "name": "Super User",
                    "value": "super_user"
                },
                {
                    "name": "Site Admin",
                    "value": "site_admin"
                }
            ]
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
        },
        "adminUser": {
            "name": "Admin User",
            "type": "select_single",
            "editable": false,
            "queryName": "admin_user",
            "apiName": "adminUser",
            "options": [],
            "optionNames": [],
            "link": "\/admin_users"
        }
    },
    "list": [
        "id",
        "role",
        "adminUser"
    ],
    "show": [
        "id",
        "role",
        "created_at",
        "updated_at",
        "adminUser"
    ],
    "edit": [
        "admin_user_id",
        "role"
    ],
    "relations": {
        "adminUser": "AdminUser"
    }
};
