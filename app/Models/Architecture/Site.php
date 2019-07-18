<?php
namespace App\Models\Architecture;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Site extends Model { // 架构 - 站点
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'architecture_sites';
    protected $fillable = [
        'slug',
        'title',
        'description',
        'address',
        'tel',
        'postcode',
        'parent_id',
        'sort',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // 属性
    // 关联
    public function users() { // 员工
        return $this->hasMany('App\Models\RBAC\User');
    }
    public function creater() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }
}
