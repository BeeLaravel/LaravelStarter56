<?php
namespace App\Models\Application;

class Note extends Model {
    protected $table = 'application_notes';
    protected $fillable = [ // 自动填充
        'slug',
        'title',
        'content',
        // 'keywords',
        // 'description',
        'category_id',
        'sort',
        'created_by',
    ];
    protected $casts = [ // 类型转换
        'keywords' => 'array',
    ];

    public static $types = [
        'MarkDown' => 'MarkDown',
        'reStructuredText' => 'reStructuredText',
        'HTML' => 'HTML',
        'TinyMCE' => 'TinyMCE',
        'UEditor' => 'UEditor',
    ];

    public function user() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }

    public function category() { // 分类 一对多 反向
        return $this->belongsTo('App\Models\Category\Category');
    }
    public function tags() { // 标签 多对多 反向
        return $this->belongsToMany(Tag::class, 'category_user_tag');
    }
}
