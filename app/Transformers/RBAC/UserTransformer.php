<?php
namespace App\Transformers\RBAC;

use League\Fractal\TransformerAbstract;

use App\Models\RBAC\User;

class UserTransformer extends TransformerAbstract {
    public function transform(User $user) {
        return [
            'id' => $user->id,

            'name' => $user->name,
            'email' => $user->email,

            // 'title' => $user->title,
            // 'avatar' => $user->avatar,
            // 'description' => $user->description,

            // 'created_at' => $user->created_at,
            // 'updated_at' => $user->updated_at,
            // 'deleted_at' => $user->deleted_at,

            // 'created_by' => $user->created_by,
            // 'updated_by' => $user->updated_by,
            // 'deleted_by' => $user->deleted_by,
        ];
    }
}
