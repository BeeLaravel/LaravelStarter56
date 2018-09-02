<?php

namespace App\Models\RBAC;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

// RBAC - 公司
class Corporation extends Model
{
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'rbac_corporations';
    protected $fillable = [
        'slug',
        'title',
        'description',
        'address',
        'tel',
        'postcode',
        'sort',
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
