<?php
namespace App\Models\RBAC;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Permission extends Model { // RBAC - 结点
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'rbac_permissions';
    protected $fillable = [
        'parent_id',
    	'slug',
        'title',
        'description',
        'sort',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // 关联
    public function roles() { // 角色
        return $this->belongsToMany('App\Models\RBAC\Role');
    }
    public function creater() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }
}
