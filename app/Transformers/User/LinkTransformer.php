<?php
namespace App\Transformers\User;

use League\Fractal\TransformerAbstract;

use App\Models\User\Link as CurrentModel;

class LinkTransformer extends TransformerAbstract {
    protected $availableIncludes = ['department']; // , 'project', 'doctor', 'star'

    public function transform(CurrentModel $item) {
        return [
            'id' => $item->id,

            'title' => $item->title,
            'url' => $item->url,
            'description' => $item->description,

            // 'created_at' => $item->created_at,
            // 'updated_at' => $item->updated_at,
            // 'deleted_at' => $item->deleted_at,

            // 'created_by' => $item->created_by,
            // 'updated_by' => $item->updated_by,
            // 'deleted_by' => $item->deleted_by,
        ];
    }
}