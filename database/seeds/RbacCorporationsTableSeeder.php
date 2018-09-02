<?php

use Illuminate\Database\Seeder;

class RbacCorporationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rbac_corporations')->delete();
        
        \DB::table('rbac_corporations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'only-hefei',
                'title' => '合壹',
                'description' => '合肥壹加壹美容医院有限公司',
                'address' => '合肥市包河区马鞍山路与九华山路交口世纪阳光大厦',
                'tel' => '0551-63413711',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'only-wuhan',
                'title' => '武壹',
                'description' => '武汉壹加壹医疗美容医院有限公司',
                'address' => '武汉市洪山区民族大道158号1栋1层1室',
                'tel' => '400-1133-711',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'only-guangzhou',
                'title' => '广壹',
                'description' => '广州壹加壹整形美容医院有限公司',
                'address' => '广州市越秀区建设三马路1号（东风东路与建设三马路交叉口）',
                'tel' => '020-83731111',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'only-ningbo',
                'title' => '宁壹',
                'description' => '宁波鄞州壹加壹美容医院有限公司',
                'address' => '宁波市鄞州区江东北路和丰创意广场谷庭楼',
                'tel' => '0574-56689966',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'slug' => 'only-wuhu',
                'title' => '芜壹',
                'description' => '芜湖壹加壹医疗美容门诊部有限公司',
                'address' => '芜湖市镜湖区文化路白金湾15-1号',
                'tel' => '400-1133-611',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'slug' => 'only-fuyang',
                'title' => '阜壹',
                'description' => '阜阳壹加壹医疗美容医院',
                'address' => NULL,
                'tel' => NULL,
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'slug' => 'only-foshan',
                'title' => '顺壹',
                'description' => '顺德壹加壹融达美容医院有限公司',
                'address' => '佛山市顺德区大良南国中路168号嘉盈楼B1座（大良客运总站正门斜对面）',
                'tel' => '400-830-8299',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'slug' => 'only-dongguan',
                'title' => '东壹',
                'description' => '东莞壹加壹整形美容医院有限公司',
                'address' => '东莞市南城街道元美路24号海悦商务大厦1-3楼',
                'tel' => '400-1199-511',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'slug' => 'only-xian',
                'title' => '西壹',
                'description' => '西安壹加壹医疗美容医院',
                'address' => NULL,
                'tel' => NULL,
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'slug' => 'only-beijing',
                'title' => '北壹',
                'description' => '北京壹加壹医疗美容门诊部有限公司',
                'address' => '北京市东城区巨石大厦（亚洲大酒店对面）',
                'tel' => '010-84001111',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'slug' => 'yimeishang',
                'title' => '壹美尚',
                'description' => '合肥壹美尚美容医院有限公司',
                'address' => '合肥市瑶海区胜利路89号瑞景家园5幢',
                'tel' => '0551-63538828',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'slug' => 'liren',
                'title' => '丽人',
                'description' => '合肥丽人妇科医院有限公司',
            'address' => '合肥市屯溪路349号(省人大站下车)',
                'tel' => '0551-63653311',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'slug' => 'only-zhengzhou',
                'title' => '郑壹',
                'description' => '郑州壹加壹医疗美容医院',
                'address' => NULL,
                'tel' => NULL,
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'slug' => 'only-group',
                'title' => '集团',
                'description' => '壹加壹控股有限公司',
                'address' => '合肥市政务区东流路与怀宁路交叉口白天鹅国际商务中心2号楼1501室',
                'tel' => '0551-63809136',
                'postcode' => NULL,
                'sort' => 255,
                'created_by' => 1,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}