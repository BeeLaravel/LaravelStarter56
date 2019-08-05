<?php
namespace App\Transformers\User;

use League\Fractal\TransformerAbstract;

use App\Models\User\Picture as CurrentModel;

class PictureTransformer extends TransformerAbstract {
    protected $availableIncludes = ['department']; // , 'project', 'doctor', 'star'

    public function transform(CurrentModel $item) {
        return [
            'id' => $item->id,

            'title' => $item->title,
            'image' => '/storage/'.$item->image,
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