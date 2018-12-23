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
        'type',
        'parent_id',
        'slug',
        'title',
        'description',
        'sort',
        'created_by',
    ];
    public static $types = [
        'commons' => '通用',
        'links' => '链接',
        'posts' => '文章',
    ];

    public function parent() { // 父级
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function children() { // 子级
        return $this->hasMany(self::class, 'parent_id');
    }
    public function user() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User');
    }
}
