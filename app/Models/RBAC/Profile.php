<?php
namespace App\Models\RBAC;

use Illuminate\Database\Eloquent\Model;

use App\Traits\Admin\ActionButtonTrait;

// RBAC 用户信息
class Profile extends Model {
    use ActionButtonTrait;

    protected $table = 'user_profiles';
    protected $primaryKey = 'user_id';
    protected $touches = ['user'];

    protected $fillable = [
        'qq',
        'wechat',
        'weibo',
        'github',
        'gitee',

        'categories',
        'tags',

        'description',
    ];

    // 关联
    public function user() { // 用户 一对一 反向
        return $this->belongsTo('App\Models\RBAC\User');
    }
}
