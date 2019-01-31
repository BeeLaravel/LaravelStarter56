<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Menu extends Model {
	use SoftDeletes;
    use ActionButtonTrait;

	protected $table = 'user_menus';
	protected $fillable = [
        'title',
        'slug',
        'type',
        'description',
        'sort',
        'created_by',
    ];

	// 关联
	public function items() { // 菜单项 一对多
        return $this->hasMany('App\Models\User\MenuItem');
    }
	public function creater() { // 创建人 一对多 反向
        return $this->hasOne('App\Models\RBAC\User', 'created_by');
    }
}
