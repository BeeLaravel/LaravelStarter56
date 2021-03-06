<?php

namespace App\Http\Controllers\Task\Weixin;

use Illuminate\Http\Request;

use DB;

class HospitalController extends Controller
{
    // select ecs_users.user_name,ecs_users.mobile_phone,ecs_users.aite_id,ecs_users.user_id,ecs_cure_num.sub_val,ecs_cure_num.num
    // from ecs_cure_num
    // left join ecs_users
    // on ecs_cure_num.user_id = ecs_users.user_id
    // where ecs_cure_num.user_id in (22,27,30,33,34,40,45,47,50,55,59,65,66,67,68,70,69,71,78,79,80,84,87,89,94,97,105,118,119,127,131,144,146,165,167,172,173,175,175,185,188,189,192,196,200,204,207,218,233,248,261,262,266,269,271,276,286,292,296,310,322,328,331,338,343,354,356,358,367,369,373,376,385,390,397,399,405,410,413,425,427,434,437,442,444,447,455,462,466,474,480,487,491,492,496,501,502,507,512,515,523,524,526,546,547,554,557,558,559,566,569,570,576,580,588,598,754,760,603,605,606,606,618,629,632,636,636,636,652,654,666,667,669,682,688,692,703,704,708,715,721,733,741,743,767,781,785,786,791,795,805,826,830,831,831,833,838,839,857,871,921,935,938,936,941,957,986,1010,1048,1060,1060,38,1115,1118,123,1173,1200,1261,1310,1405,1429,1457,1474,459,1595,1600,1641,1665,1665,1665,1665,1671,1674,1674,1674,1770,1821,1841,1841,1859,1899,1903,1903,1989,1989,2046,2127,2574,2605,2648,3419,3575,3603,3748,3903,4374,4413,4424,2283,2283,2283,4540,4622,4982,5331,2471,6697,6948,7164,7398,7398,7398,7716,7729,7817,7817,8139,8231,8231,8337,8569,8569,8852,9614,9839,9839,10152,10178,10202,10217,10605,10679,11869,11973,12034,12073,12512,13439,13439,13439,13439,13538,14403,14461,13899,14795,14795,14907,14981,15196,15231,15539,15780,16036,16258,16265,16645,16777,16855,17641,17844,18022,18089,18321,18392,18851,20054,20552,20580,20720,21082,21082,21082,21369,21369,21369,64251,66741,69846,14070)
    public function cureNumGreateThan100() {
        $ids = [];

        DB::connection('only_hefei_weixin')
            ->table('cure_num')
            ->orderBy('id')
            ->chunk(500, function ($list) use (&$ids) {
                foreach ( $list as $item ) {
                    $counts = explode(',', $item->num);

                    foreach ( $counts as $count ) {
                        if ( $count>=100 ) {
                            $ids[] = $item->user_id;
                            // echo $item->user_id."\n";
                        }
                    }
                }
            });

        echo implode(',', $ids)."\n";
    }
}
