<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Keyword extends Model
{
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'post_keywords';
    protected $fillable = [
        'title',
    ];
}
