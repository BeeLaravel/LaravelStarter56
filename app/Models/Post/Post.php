<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Post extends Model
{
    use SoftDeletes;
    use ActionButtonTrait;

    protected $fillable = [
        'title',
        'slug',
        'keywords',
        'description',
        'content',
        'sort',
        'user_id',
        'category_id',
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
