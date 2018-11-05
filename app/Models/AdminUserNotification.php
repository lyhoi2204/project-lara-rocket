<?php

namespace App\Models;

use LaravelRocket\Foundation\Models\Base;

/**
 * App\Models\AdminUserNotification.
 *
 * @method \App\Presenters\AdminUserNotificationPresenter present()
 * @property int $id
 * @property int $admin_user_id
 * @property string $type
 * @property array|null $data
 * @property int $notified_at
 * @property int $read_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\AdminUser $adminUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserNotification whereAdminUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserNotification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserNotification whereNotifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserNotification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserNotification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class AdminUserNotification extends Base
{



    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'admin_user_notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'admin_user_id',
        'type',
        'data',
        'notified_at',
        'read_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var  array
     */
    protected $hidden = [];

    protected $dates  = [
    ];

    protected $casts     = [
        'data' => 'array',
    ];

    protected $presenter = \App\Presenters\AdminUserNotificationPresenter::class;

    public function adminUser()
    {
        return $this->belongsTo(\App\Models\AdminUser::class, 'admin_user_id', 'id');
    }




}
