<?php

namespace App\Models\RBAC;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

// RBAC - 权限
class Permission extends Model
{
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'rbac_permissions';
    protected $fillable = [
    	'slug',
        'title',
        'description',
        'parent_id',
    ];

    // 关联
    public function roles() { // 角色
        return $this->belongsToMany('App\Models\RBAC\Role');
    }
    public function creater() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }
}
