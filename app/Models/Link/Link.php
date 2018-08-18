<?php

namespace App\Models\Link;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Link extends Model
{
    use SoftDeletes;
    use ActionButtonTrait;

    protected $fillable = [
        'slug',
        'title',
        'url',
        'type',
        'category_id',
        'description',
        'sort',
        'user_id',
    ];
    public static $types = [
        'Site' => '站点',
        'SubSite' => '子站点',
        'Special' => '专题',
        'Category' => '分类',
        'Tag' => '标签',
        'Post' => '文章',
        'Discuss' => '讨论',
        'Other' => '其它',
    ];

    public function category() { // 分类
        return $this->belongsTo('App\Models\Link\Tag', 'category_id');
    }
    public function user() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User');
    }
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
