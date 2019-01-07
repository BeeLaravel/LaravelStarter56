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
        'title',
        'slug',
        'type',
        'description',
        'created_by',
    ];

    public function user() { // 创建人
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }

    public function links() { // 链接
        return $this->belongsToMany('App\Models\User\Link');
    }
    public function posts() { // 文章
        return $this->belongsToMany('App\Models\User\Post');
    }
}
