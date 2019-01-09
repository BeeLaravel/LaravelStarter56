<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class MenuItem extends Model {
	protected $table = 'user_menu_items';

    protected static function boot() {
        parent::boot();

        static::addGlobalScope('sort', function (Builder $builder) {
            $builder->orderBy('sort');
        });
    }

	// 关联
	public function menu() { // 菜单 一对多 反向
        return $this->hasOne('App\Models\User\Menu');
    }
    public function parent() { // 父菜单 一对多 反向
        return $this->hasOne('App\Models\User\MenuItem', 'parent_id');
    }
    public function children() { // 子菜单 一对多
        return $this->hasMany('App\Models\User\MenuItem', 'parent_id');
    }
	public function creater() { // 创建人 一对多 反向
        return $this->hasOne('App\Models\RBAC\User', 'created_by');
    }
}
