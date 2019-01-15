<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class DatabaseTest extends \Tests\TestCase {
    use RefreshDatabase;

    public function testBasic() {
        $this->assertDatabaseHas('users', [
            'email' => 'sally@example.com'
        ]);

        $user = factory(App\User::class)->make();
        $users = factory(App\User::class, 3)->make();

        $users = factory(App\User::class, 5)->states('delinquent')->make(); // 应用状态
        $users = factory(App\User::class, 5)->states('premium', 'delinquent')->make();

        $user = factory(App\User::class)->make([ // 覆盖字段
            'name' => 'Abigail',
        ]);

        $user = factory(App\User::class)->create(); // 持久化
        $users = factory(App\User::class, 3)->create();

        $user = factory(App\User::class)->create([
            'name' => 'Abigail',
        ]);
        $users = factory(App\User::class, 3)
            ->create()
            ->each(function ($u) {
                $u->posts()->save(factory(App\Post::class)->make());
            });
    }
}
// ## Database 数据库

// ### Database 数据库
    // assertDatabaseHas // 数据库存在
    // assertDatabaseMissing  // 数据库不存在
    // assertSoftDeleted // 已被软删除
