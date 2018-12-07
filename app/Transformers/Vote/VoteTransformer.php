<?php
namespace App\Transformers\Vote;

use League\Fractal\TransformerAbstract;

use App\Models\Vote\Vote;

class VoteTransformer extends TransformerAbstract {
    protected $availableIncludes = ['user', 'category', 'topReplies'];

    public function transform(Vote $vote) {
        return [
            'id' => $vote->id,

            'title' => $vote->title,
            'avatar' => $vote->avatar,
            'description' => $vote->description,
            'swipers' => $vote->swipers,

            'start_at' => $vote->start_at,
            'finish_at' => $vote->finish_at,

            'attended_count' => $vote->attended_count,
            'voted_count' => $vote->voted_count,
            'visited_count' => $vote->visited_count,

            'seo_title' => $vote->seo_title,
            'seo_keywords' => $vote->seo_keywords,
            'seo_description' => $vote->seo_description,

            // 'created_at' => $vote->created_at,
            // 'updated_at' => $vote->updated_at,
            // 'deleted_at' => $vote->deleted_at,

            // 'created_by' => $vote->created_by,
            // 'updated_by' => $vote->updated_by,
            // 'deleted_by' => $vote->deleted_by,
        ];
    }

    public function includeUser(Vote $vote) {
        return $this->item($vote->creater, new \App\Transformers\RBAC\UserTransformer());
    }
    public function includeUsers(Vote $vote) {
        return $this->collection($vote->users, new UserTransformer());
    }
    public function includeLogs(Vote $vote) {
        return $this->collection($vote->logs, new UserTransformer());
    }
}