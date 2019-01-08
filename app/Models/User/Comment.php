<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	protected $table = 'user_comment';
    protected $fillable = [
    	'',
    	'',
        'parent_id',
        'content',
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

	public function category() { // 分类 一对多 反向
        return $this->belongsTo('App\Models\User\Category');
    }
    public function tag() { // 标签 一对多 反向
        return $this->belongsTo(Tag::class);
    }
    public function link() { // 链接 一对多 反向
        return $this->belongsTo('App\Models\User\Link');
    }
    public function post() { // 文章 一对多 反向
        return $this->belongsTo('App\Models\User\Post');
    }
    public function page() { // 页面 一对多 反向
        return $this->belongsTo('App\Models\User\Page');
    }
}
