<?php

namespace App\Models\RBAC;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

// RBAC 角色
class Role extends Model
{
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'rbac_roles';

    protected $fillable = [
        'slug',
        'title',
        'description',
        'parent_id',
    ];
    protected $hidden = [];

    // 关联
    public function permissions() { // 权限
        return $this->belongsToMany('App\Models\RBAC\Permission');
    }
    public function users() { // 用户
        return $this->belongsToMany('App\Models\RBAC\User');
    }
    public function creater() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }
}
