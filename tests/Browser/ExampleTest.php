<?php
namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome;

use App\User; // 模型

class ExampleTest extends \Tests\DuskTestCase {
    use DatabaseMigrations;

    public function testBasicExample() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
        $user = factory(User::class)->create([
            'email' => 'taylor@laravel.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');
        });
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1)) // 认证
                ->visit('/home') // 访问
                ->waitForText('Message') // 断言文本
                ->type('message', 'Hey Taylor') // 文本
                ->press('Send'); // 发送

            $first->waitForText('Hey Taylor')
                ->assertSee('Jeffrey Way');
        });

        $browser->resize(1920, 1080); // 调整浏览器窗口大小
        $browser->maximize(); // 浏览器最大化
    }
}
