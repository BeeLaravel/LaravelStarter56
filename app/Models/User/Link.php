<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Link extends Model {
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'user_links';
    protected $fillable = [
        'title',
        'url',
        'type',
        'category_id',
        'description',
        'sort',
        'created_by',
    ];

    public function user() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }

    public function category() { // 分类 一对多 反向
        return $this->belongsTo('App\Models\User\Category', 'category_id');
    }
    public function tags() { // 标签 多对多 反向
        return $this->belongsToMany('App\Models\User\Tag', 'user_tag', 'id')->wherePivot('table', 'links');
    }
}
