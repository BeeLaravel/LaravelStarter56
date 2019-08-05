<?php
namespace App\Models\Category;

use Illuminate\Database\Eloquent\Builder;

class MenuItem extends Model {
	protected $table = 'category_menu_items';
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'menu_id',
        'parent_id',
        'description',
        'created_by',
        'sort',
    ];

    protected static function boot() {
        parent::boot();

        static::addGlobalScope('sort', function (Builder $builder) {
            $builder->orderBy('sort');
        });
    }

	// 关联
	public function menu() { // 菜单 一对多 反向
        return $this->hasOne('App\Models\Category\Menu');
    }
    public function parent() { // 父菜单 一对多 反向
        return $this->hasOne('App\Models\Category\MenuItem', 'parent_id');
    }
    public function children() { // 子菜单 一对多
        return $this->hasMany('App\Models\Category\MenuItem', 'parent_id');
    }
	public function creater() { // 创建人 一对多 反向
        return $this->hasOne('App\Models\RBAC\User', 'created_by');
    }
}
