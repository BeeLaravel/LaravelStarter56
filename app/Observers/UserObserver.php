<?php
namespace App\Observers;

use App\User;

class UserObserver {
    public function created(User $user) {
    }
    public function deleting(User $user) {
    }
}