<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

class Keyword extends Model {
    use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'user_post_keywords';
    protected $fillable = [
        'title',
    ];
}
