<?php
namespace App\Transformers\Vote;

use League\Fractal\TransformerAbstract;

use App\Models\Vote\User;

class UserTransformer extends TransformerAbstract {
    public function transform(User $user) {
        return [
            'id' => $user->id,
            'vote_id' => $user->vote_id,

            'title' => $user->title,
            'avatar' => $user->avatar,
            'description' => $user->description,

            'vote_count' => $user->vote_count,
            'visit_count' => $user->visit_count,

            // 'created_at' => $user->created_at,
            // 'updated_at' => $user->updated_at,
            // 'deleted_at' => $user->deleted_at,

            // 'created_by' => $user->created_by,
            // 'updated_by' => $user->updated_by,
            // 'deleted_by' => $user->deleted_by,
        ];
    }
}
