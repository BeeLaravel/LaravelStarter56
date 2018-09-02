<?php

use Illuminate\Database\Seeder;

class RbacUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rbac_users')->delete();
        
        \DB::table('rbac_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '储成英',
                'email' => 'beherochuling@163.com',
                'corporation_id' => 14,
                'password' => '',
                'remember_token' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '储诚英',
                'email' => 'beherochuling@sina.com',
                'corporation_id' => 1,
                'password' => '',
                'remember_token' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '储成瑛',
                'email' => 'beherochuling@sohu.com',
                'corporation_id' => 2,
                'password' => '',
                'remember_token' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '储晓亮',
                'email' => 'beherochuling@qq.com',
                'corporation_id' => 3,
                'password' => '',
                'remember_token' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '储小亮',
                'email' => 'beesoft01@gmail.com',
                'corporation_id' => 4,
                'password' => '',
                'remember_token' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '胡春明',
                'email' => 'huchunming@163.com',
                'corporation_id' => 14,
                'password' => '',
                'remember_token' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '陈传林',
                'email' => 'chenchuanlin@163.com',
                'corporation_id' => 1,
                'password' => '',
                'remember_token' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '陈梦佳',
                'email' => 'chenmengjia@163.com',
                'corporation_id' => 2,
                'password' => '',
                'remember_token' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '吴义月',
                'email' => 'wuyiyue@163.com',
                'corporation_id' => 12,
                'password' => '',
                'remember_token' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '黄良伟',
                'email' => 'huangliangwei@163.com',
                'corporation_id' => 3,
                'password' => '',
                'remember_token' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '张煌珍',
                'email' => 'zhanghuangzhen@163.com',
                'corporation_id' => 10,
                'password' => '',
                'remember_token' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '王磊',
                'email' => 'wanglei@163.com',
                'corporation_id' => 4,
                'password' => '',
                'remember_token' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '田小董',
                'email' => 'tianxiaodong@163.com',
                'corporation_id' => 9,
                'password' => '',
                'remember_token' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '陈华侨',
                'email' => 'chenhuaqiao@163.com',
                'corporation_id' => 8,
                'password' => '',
                'remember_token' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '吴媛媛',
                'email' => 'wuyuanyuan@163.com',
                'corporation_id' => 1,
                'password' => '',
                'remember_token' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '吴项承',
                'email' => 'wuxiangcheng@163.com',
                'corporation_id' => 1,
                'password' => '',
                'remember_token' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '曹湾湾',
                'email' => 'caowanwan@163.com',
                'corporation_id' => 4,
                'password' => '',
                'remember_token' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => '张志翀',
                'email' => 'zhangzhichong@163.com',
                'corporation_id' => 10,
                'password' => '',
                'remember_token' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '高磊玉',
                'email' => 'gaoleiyu@163.com',
                'corporation_id' => 12,
                'password' => '',
                'remember_token' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => '钱启翔',
                'email' => 'qianqixiang@163.com',
                'corporation_id' => 2,
                'password' => '',
                'remember_token' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => '陈鹏',
                'email' => 'chenpeng@163.com',
                'corporation_id' => 3,
                'password' => '',
                'remember_token' => NULL,
            ),
        ));
        
        
    }
}