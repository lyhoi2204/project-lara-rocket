<?php

namespace App\Models;

use LaravelRocket\Foundation\Models\Base;

/**
 * App\Models\AdminUserRole.
 *
 * @method \App\Presenters\AdminUserRolePresenter present()
 * @property int $id
 * @property int $admin_user_id
 * @property string $role
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\AdminUser $adminUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserRole whereAdminUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserRole whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AdminUserRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class AdminUserRole extends Base
{


    const ROLE_SITE_ADMIN = 'site_admin';
    const ROLE_SUPER_USER = 'super_user';

    /**
     * The database table used by the model.
     *
     * @var  string
     */
    protected $table = 'admin_user_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'admin_user_id',
        'role',
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
    ];

    protected $presenter = \App\Presenters\AdminUserRolePresenter::class;

    public function adminUser()
    {
        return $this->belongsTo(\App\Models\AdminUser::class, 'admin_user_id', 'id');
    }




}
