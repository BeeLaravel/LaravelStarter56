<?php
namespace App\Transformers\Project;

use League\Fractal\TransformerAbstract;

use App\Models\Project\Cases;

class CasesTransformer extends TransformerAbstract {
    protected $availableIncludes = ['department']; // , 'project', 'doctor', 'star'
    public function transform(Cases $cases) {
        return [
            'id' => $cases->id,

            'title' => $cases->title,
            'file_original' => '/' . Config('images.original') . $cases->filename,
            'file_thumbnail' => '/' . Config('images.thumbnail') . $cases->filename,
            'description' => $cases->description,
            'width' => $cases->width,
            'height' => $cases->height,

            // 'department_id' => $cases->department_id, // 关联
            // 'project_id' => $cases->project_id,
            // 'doctor_id' => $cases->doctor_id,
            // 'star_id' => $cases->star_id,

            'department' => $cases->department, // 关联
            'project' => $cases->project,
            'doctor' => $cases->doctor,
            'star' => $cases->star,

            // 'created_at' => $cases->created_at,
            // 'updated_at' => $cases->updated_at,
            // 'deleted_at' => $cases->deleted_at,

            // 'created_by' => $cases->created_by,
            // 'updated_by' => $cases->updated_by,
            // 'deleted_by' => $cases->deleted_by,
        ];
    }

    // public function includeDepartment(Cases $cases) { // 科室
    //     return $this->item($cases->category, new UserTransformer());
    // }
    // public function includeProject(Cases $cases) { // 项目
    //     return $this->item($cases->project, new Transformer());
    // }
    // public function includeDoctor(Cases $cases) { // 医师
    //     return $this->item($cases->doctor, new \App\Transformers\RBAC\UserTransformer());
    // }
    // public function includeStar(Cases $cases) { // 星级
    //     return $this->item($cases->category, new UserTransformer());
    // }
}