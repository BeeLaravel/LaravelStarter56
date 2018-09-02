<?php

use Illuminate\Database\Seeder;

class PostTagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_tags')->delete();
        
        \DB::table('post_tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'PHP',
                'slug' => 'php',
                'description' => 'PHP',
                'user_id' => 0,
                'parent_id' => 0,
                'sort' => 255,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'PHPFramework',
                'slug' => 'phpframework',
                'description' => 'PHP Framework',
                'user_id' => 0,
                'parent_id' => 1,
                'sort' => 255,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Laravel',
                'slug' => 'laravel',
                'description' => 'Laravel',
                'user_id' => 0,
                'parent_id' => 1,
                'sort' => 255,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'ThinkPHP',
                'slug' => 'thinkphp',
                'description' => 'ThinkPHP',
                'user_id' => 0,
                'parent_id' => 1,
                'sort' => 255,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'YiiFramework',
                'slug' => 'yiiframework',
                'description' => 'Yii Framework',
                'user_id' => 0,
                'parent_id' => 1,
                'sort' => 255,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'PHPPackage',
                'slug' => 'phppackage',
                'description' => 'PHP Package',
                'user_id' => 0,
                'parent_id' => 1,
                'sort' => 255,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'PHPAPIPackage',
                'slug' => 'phpapipackage',
                'description' => 'PHP API Package',
                'user_id' => 0,
                'parent_id' => 6,
                'sort' => 255,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'PHPPolyfillPackage',
                'slug' => 'phppolyfillpackage',
                'description' => 'PHP Polyfill Package',
                'user_id' => 0,
                'parent_id' => 6,
                'sort' => 255,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'PHPUIPackage',
                'slug' => 'phpuipackage',
                'description' => 'PHP UI Package',
                'user_id' => 0,
                'parent_id' => 6,
                'sort' => 255,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Java',
                'slug' => 'java',
                'description' => 'Java',
                'user_id' => 0,
                'parent_id' => 0,
                'sort' => 255,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Android',
                'slug' => 'android',
                'description' => 'Android',
                'user_id' => 0,
                'parent_id' => 10,
                'sort' => 255,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'SpringBoot',
                'slug' => 'springboot',
                'description' => 'Spring Boot',
                'user_id' => 0,
                'parent_id' => 10,
                'sort' => 255,
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'JavaScript',
                'slug' => 'javascript',
                'description' => 'JavaScript',
                'user_id' => 0,
                'parent_id' => 0,
                'sort' => 255,
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'Vue',
                'slug' => 'vue',
                'description' => 'Vue',
                'user_id' => 0,
                'parent_id' => 13,
                'sort' => 255,
            ),
            14 => 
            array (
                'id' => 15,
                'title' => 'React',
                'slug' => 'react',
                'description' => 'React',
                'user_id' => 0,
                'parent_id' => 13,
                'sort' => 255,
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'Angular',
                'slug' => 'angular',
                'description' => 'Angular',
                'user_id' => 0,
                'parent_id' => 13,
                'sort' => 255,
            ),
            16 => 
            array (
                'id' => 18,
                'title' => 'VueRoute',
                'slug' => 'vueroute',
                'description' => 'VueRoute',
                'user_id' => 0,
                'parent_id' => 14,
                'sort' => 255,
            ),
            17 => 
            array (
                'id' => 17,
                'title' => 'Vuex',
                'slug' => 'vuex',
                'description' => 'Vuex',
                'user_id' => 0,
                'parent_id' => 14,
                'sort' => 255,
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'Axios',
                'slug' => 'axios',
                'description' => 'Axios',
                'user_id' => 0,
                'parent_id' => 14,
                'sort' => 255,
            ),
            19 => 
            array (
                'id' => 20,
                'title' => 'Python',
                'slug' => 'python',
                'description' => 'Python',
                'user_id' => 0,
                'parent_id' => 0,
                'sort' => 255,
            ),
            20 => 
            array (
                'id' => 21,
                'title' => 'PythonFramework',
                'slug' => 'pythonframework',
                'description' => 'Python Framework',
                'user_id' => 0,
                'parent_id' => 20,
                'sort' => 255,
            ),
            21 => 
            array (
                'id' => 22,
                'title' => 'Node',
                'slug' => 'node',
                'description' => 'Node',
                'user_id' => 0,
                'parent_id' => 13,
                'sort' => 255,
            ),
            22 => 
            array (
                'id' => 23,
                'title' => 'Express',
                'slug' => 'express',
                'description' => 'Express',
                'user_id' => 0,
                'parent_id' => 22,
                'sort' => 255,
            ),
        ));
        
        
    }
}