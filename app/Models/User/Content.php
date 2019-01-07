<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {
    protected $table = 'user_post_contents';
    protected $fillable = [
        'post_id',
        'content_type',
        'content',
    ];

    public static $types = [
        'MarkDown' => 'MarkDown',
        'reStructuredText' => 'reStructuredText',
        'HTML' => 'HTML',
        'TinyMCE' => 'TinyMCE',
        'UEditor' => 'UEditor',
    ];

    public function post() { // 内容 一对一 反向
        return $this->belongsTo('App\Models\User\Post');
    }
}
