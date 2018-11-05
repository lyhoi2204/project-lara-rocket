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
        "type": {
            "name": "Type",
            "type": "select_single",
            "editable": true,
            "queryName": "type",
            "apiName": "type",
            "options": [
                {
                    "name": "Information",
                    "value": "information"
                },
                {
                    "name": "Warning",
                    "value": "warning"
                },
                {
                    "name": "Alert",
                    "value": "alert"
                }
            ]
        },
        "data": {
            "name": "Data",
            "type": "textarea",
            "editable": true,
            "queryName": "data",
            "apiName": "data",
            "options": []
        },
        "notified_at": {
            "name": "Notified At",
            "type": "datetime",
            "editable": true,
            "queryName": "notified_at",
            "apiName": "notifiedAt",
            "options": []
        },
        "read_at": {
            "name": "Read At",
            "type": "datetime",
            "editable": true,
            "queryName": "read_at",
            "apiName": "readAt",
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
        "type",
        "notified_at",
        "read_at",
        "adminUser"
    ],
    "show": [
        "id",
        "type",
        "data",
        "notified_at",
        "read_at",
        "adminUser"
    ],
    "edit": [
        "admin_user_id",
        "type",
        "data",
        "notified_at",
        "read_at"
    ],
    "relations": {
        "adminUser": "AdminUser"
    }
};
