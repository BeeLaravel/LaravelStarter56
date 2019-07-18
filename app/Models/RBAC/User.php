<?php
namespace App\Models\RBAC;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable { // RBAC - 用户
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
        return $this->belongsTo('App\Models\Architecture\Corporation');
    }
    public function roles() { // 角色
        return $this->belongsToMany('App\Models\Architecture\User', 'created_by');
    }
    public function creater() { // 创建人
        return $this->belongsTo('App\Models\Architecture\User', 'created_by');
    }

    public function profile() { // 个人信息 一对一
        return $this->hasOne('App\Models\RBAC\Profile');
    }
}
