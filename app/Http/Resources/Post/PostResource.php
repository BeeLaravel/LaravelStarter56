<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // 'posts' => PostResource::collection($this->posts),
            // 'secret' => $this->when($this->isAdmin(), 'secret-value'),
            // 'secret' => $this->when($this->isAdmin(), function () {
            //     return 'secret-value';
            // }),
            $this->mergeWhen($this->isAdmin(), [
                'first-secret' => 'value',
                'second-secret' => 'value',
            ]),
            'posts' => Post::collection($this->whenLoaded('posts')),
            'expires_at' => $this->whenPivotLoaded('role_users', function () {
                return $this->pivot->expires_at;
            }),
        ];
    }
    public function with($request)
    {
        return [
            'meta' => [
                'key' => 'value',
            ],
        ];
    }
    public function withResponse($request, $response)
    {
        $response->header('X-Value', 'True');
    }
}
