<?php

use Illuminate\Database\Seeder;

class LinkTagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('link_tags')->delete();
        
        \DB::table('link_tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'slug' => 'php',
                'title' => 'PHP',
                'description' => 'PHP',
                'user_id' => 1,
                'sort' => 255,
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 1,
                'slug' => 'framework',
                'title' => 'PHPFramework',
                'description' => 'PHP Framework',
                'user_id' => 1,
                'sort' => 255,
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 1,
                'slug' => 'laravel',
                'title' => 'Laravel',
                'description' => 'Laravel',
                'user_id' => 1,
                'sort' => 255,
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 1,
                'slug' => 'thinkphp',
                'title' => 'ThinkPHP',
                'description' => 'ThinkPHP',
                'user_id' => 1,
                'sort' => 255,
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 1,
                'slug' => 'yiiframework',
                'title' => 'YiiFramework',
                'description' => 'Yii Framework',
                'user_id' => 1,
                'sort' => 255,
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 1,
                'slug' => 'Package',
                'title' => 'PHPPackage',
                'description' => 'PHP Package',
                'user_id' => 1,
                'sort' => 255,
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 0,
                'slug' => 'server-static3',
                'title' => 'server-static',
                'description' => NULL,
                'user_id' => 0,
                'sort' => 255,
            ),
        ));
        
        
    }
}