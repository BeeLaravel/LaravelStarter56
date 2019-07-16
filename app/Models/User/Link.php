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

    protected static function boot() {
        parent::boot();

        static::addGlobalScope(new \App\Scopes\OrderbySortScope);
        // static::addGlobalScope('age', function (Builder $builder) {
        //     $builder->where('age', '>', 200);
        // });

        // User::withoutGlobalScope(AgeScope::class)->get();
        // User::withoutGlobalScope('age')->get();
        // User::withoutGlobalScopes()->get();
        // User::withoutGlobalScopes([
        //     FirstScope::class, SecondScope::class
        // ])->get();
    }

    // public function scopePopular($query) {
    //     return $query->where('votes', '>', 100);
    // }
    // public function scopeActive($query) {
    //     return $query->where('active', 1);
    // }
    // public function scopeOfType($query, $type) { // 动态范围
    //     return $query->where('type', $type);
    // }
    // $users = App\User::popular()->active()->orderBy('created_at')->get();
    // $users = App\User::ofType('admin')->get();

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
