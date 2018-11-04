<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
	protected $table = 'system_menus';

	// 关联
	public function items() { // 菜单项 一对多
        return $this->hasMany('App\Models\System\MenuItem');
    }
	// public function creater() { // 创建人 一对一
    //     return $this->hasOne('App\Models\RBAC\User', 'created_by');
    // }
}
