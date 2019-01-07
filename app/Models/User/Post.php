<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Post extends Model {
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'user_posts';
    protected $fillable = [ // 自动填充
        'title',
        'slug',
        'keywords',
        'description',
        'category_id',
        'sort',
        'created_by',
    ];
    protected $casts = [ // 类型转换
        'keywords' => 'array',
    ];

    public function category() { // 分类 一对多 反向
        return $this->belongsTo('App\Models\User\Category');
    }
    public function tags() { // 标签 多对多 反向
        return $this->belongsToMany(Tag::class);
    }
    public function content() { // 内容 一对一
        return $this->hasOne('App\Models\User\Content')->withDefault();
    }
    public function user() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }
}
