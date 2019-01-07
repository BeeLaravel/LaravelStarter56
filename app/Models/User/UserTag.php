<?php
namespace App\Models\User;

class UserTag extends \Illuminate\Database\Eloquent\Relations\Pivot {
	protected $table = 'user_tag';
}
