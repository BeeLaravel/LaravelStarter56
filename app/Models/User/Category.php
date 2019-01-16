<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Category extends Model {
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'user_categories';
    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'type',
        'description',
        'sort',
        'created_by',
    ];

    public function parent() { // 父级 一对多 反向
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function children() { // 子级 一对多
        return $this->hasMany(self::class, 'parent_id');
    }
    public function user() { // 创建人 一对多 反向
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }

    public function links() { // 链接 一对多
        return $this->hasMany('App\Models\User\Link');
    }
    public function posts() { // 文章 一对多
        return $this->hasMany('App\Models\User\Post');
    }
    public function pages() { // 页面 一对多
        return $this->hasMany('App\Models\User\Page');
    }
}
