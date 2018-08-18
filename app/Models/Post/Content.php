<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
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

    public function post() { // 内容
        return $this->belongsTo('App\Models\Post\Post');
    }
}
