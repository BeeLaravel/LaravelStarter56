<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ConsoleTest extends \Tests\TestCase {
    public function testBasic() {
        $this->artisan('laracon') // 命令行
            ->expectsQuestion('What is your name?', 'Taylor Otwell') // 问题
            ->expectsQuestion('Which language do you program in?', 'PHP')
            ->expectsOutput('Your name is Taylor Otwell and you program in PHP.') // 输出
            ->assertExitCode(0); // 退出码
    }
}
// ## Console 控制台

// ### Console
    // expectsQuestion // 对话
    // expectsOutput // 输出
    // assertExitCode // 输出码
