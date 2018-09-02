<?php

namespace App\Models\RBAC;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// RBAC - 用户
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'rbac_users';
    protected $fillable = [
        'name',
        'email',
        'corporation_id',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 关联
    public function corporation() { // 公司
        return $this->belongsTo('App\Models\RBAC\Corporation');
    }
    public function roles() { // 角色
        return $this->belongsToMany('App\Models\RBAC\User', 'created_by');
    }
    public function creater() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }
}
