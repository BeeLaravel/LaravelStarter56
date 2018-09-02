<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'JSON 跨域',
                'slug' => 'json-crossdomain',
                'keywords' => '["JSON","\\u8de8\\u57df"]',
                'description' => NULL,
                'user_id' => 0,
                'category_id' => 0,
                'sort' => 255,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'axios',
                'slug' => 'axios',
                'keywords' => '["ajax","vue"]',
                'description' => 'Axios 是一个基于 promise 的 HTTP 库，可以用在浏览器和 node.js 中',
                'user_id' => 0,
                'category_id' => 0,
                'sort' => 255,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'server-static4',
                'slug' => 'server-static4',
                'keywords' => '["node","express"]',
                'description' => NULL,
                'user_id' => 0,
                'category_id' => 0,
                'sort' => 255,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'server-static1',
                'slug' => 'server-static1',
                'keywords' => NULL,
                'description' => NULL,
                'user_id' => 0,
                'category_id' => 0,
                'sort' => 255,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Express.js',
                'slug' => 'Express.js',
                'keywords' => NULL,
                'description' => NULL,
                'user_id' => 0,
                'category_id' => 0,
                'sort' => 255,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'server-static',
                'slug' => 'server-static',
                'keywords' => NULL,
                'description' => '描述',
                'user_id' => 0,
                'category_id' => 0,
                'sort' => 254,
            ),
        ));
        
        
    }
}