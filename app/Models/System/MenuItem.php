<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model {
	protected $table = 'system_menu_items';

	// 关联
	public function menu() { // 菜单 一对多 反向
        return $this->hasOne('App\Models\System\Menu');
    }
    public function parent() { // 父菜单 一对多 反向
        return $this->hasOne('App\Models\System\MenuItem', 'parent_id');
    }
    public function children() { // 子菜单 一对多
        return $this->hasMany('App\Models\System\MenuItem', 'parent_id');
    }
	// public function creater() { // 创建人 一对一
    //     return $this->hasOne('App\Models\RBAC\User', 'created_by');
    // }
}
