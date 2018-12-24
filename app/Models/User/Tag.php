<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Tag extends Model {
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'user_tags';
    protected $fillable = [
        'parent_id',
        'slug',
        'title',
        'description',
        'sort',
        'user_id',
    ];

    public function user() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User');
    }
    public function links() { // 链接
        return $this->belongsToMany('App\Models\Link\Link');
    }
    public function posts() { // 文章
        return $this->belongsToMany('App\Models\Post\Post');
    }
}
