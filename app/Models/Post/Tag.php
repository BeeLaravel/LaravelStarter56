<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Tag extends Model
{
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'post_tags';
    protected $fillable = [
        'parent_id',
        'slug',
        'title',
        'description',
        'sort',
        'user_id',
    ];

    public function parent() { // 父级
        return $this->belongsTo('App\Models\Link\Tag', 'parent_id');
    }
    public function user() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User');
    }
}
