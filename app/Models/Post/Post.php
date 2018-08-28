<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Post extends Model
{
    use SoftDeletes;
    use ActionButtonTrait;

    protected $fillable = [ // 自动填充
        'title',
        'slug',
        'keywords',
        'description',
        'sort',
        'user_id',
        'category_id',
    ];
    protected $casts = [ // 类型转换
        'keywords' => 'array',
    ];

    public function category() { // 分类
        return $this->belongsTo('App\Models\Post\Tag', 'category_id');
    }
    public function user() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User');
    }
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
    public function content() { // 内容
        return $this->hasOne('App\Models\Post\Content')->withDefault();
    }
}
