<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
	protected $table = 'user_menus';

	// 关联
	public function items() { // 菜单项 一对多
        return $this->hasMany('App\Models\User\MenuItem');
    }
	public function creater() { // 创建人 一对多 反向
        return $this->hasOne('App\Models\RBAC\User', 'created_by');
    }
}
