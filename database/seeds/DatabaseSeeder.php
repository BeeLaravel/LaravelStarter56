<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        $this->call(RbacCorporationsTableSeeder::class);
        $this->call(RbacUsersTableSeeder::class);
        $this->call(PostTagsTableSeeder::class);
        $this->call(LinkTagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
