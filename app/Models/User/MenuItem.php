<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class MenuItem extends Model {
    use SoftDeletes;
    use ActionButtonTrait;

	protected $table = 'user_menu_items';
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
