<?php
namespace App\Models\Configure;

class Configure extends Model {
    // protected $table = 'configures';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'sort',
        'created_by',
    ];

    public function user() { // 创建人 一对多 反向
        return $this->belongsTo('App\Models\RBAC\User', 'created_by');
    }
}
