<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Admin\ActionButtonTrait;

// 竞价报表
class Sem extends Model
{
	use SoftDeletes;
    use ActionButtonTrait;

    protected $table = 'report_sems';
    protected $fillable = [
        'corporation_id',
        'date',
        'type',
        'dialog_useful',
        'dialog_useless',
        'bespeak',
        'visit',
        'consumption',
		'consumption_real',
		// 'created_by',
    ];
}
