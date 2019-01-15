<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class HttpTest extends \Tests\TestCase {
    public function testBasic() {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])
        ->json('POST', '/user', ['name' => 'Sally']);

        $response
            ->assertStatus(201)
            ->assertJson([ // json 断言
                'created' => true,
            ])
            ->assertExactJson([ // 完全 json 断言
                'created' => true,
            ]);
    }
    public function testBasic2() {
        $user = factory(User::class)->create(); // 创建模型

        $response = $this
            ->actingAs($user)
            // ->actingAs($user, 'api')
            ->withSession([
                'foo' => 'bar',
            ])
            ->get('/');
    }
    public function testAvatarUpload() {
        Storage::fake('avatars'); // 存储

        $file = UploadedFile::fake()
            ->image('avatar.jpg')
            ->image('avatar.jpg', $width, $height)->size(100)
            ->create('document.pdf', $sizeInKilobytes)
            ;

        $response = $this->json('POST', '/avatar', [
            'avatar' => $file,
        ]);

        Storage::disk('avatars')
            ->assertExists($file->hashName()) // 存在
            ->assertMissing('missing.jpg') // 不存在
            ;
    }
}
// ## Http

// ### Header
    // assertHeader // 存在头部
    // assertHeaderMissing // 不存在
    // assertLocation // Location 头部
    // assertRedirect // 重定向

// ### 字符串
    // assertSee // 包含字符串
    // assertDontSee 响应中不包含字符串
    // assertSeeInOrder
    // assertSeeText
    // assertDontSeeText 响应文本中不包含字符串
    // assertSeeTextInOrder

// ### JSON
    // assertJson // 存在 JSON
    // assertJsonMissing // 不存在 JSON
    // assertExactJson // 完全匹配 JSON
    // assertJsonMissingExact // 不完全匹配 JSON
    // assertJsonCount // 数量
    // assertJsonStructure 结构
    // assertJsonFragment // 片段
    // assertJsonValidationErrors // 给定键的给定 JSON 验证错误

// ### Session
    // assertSessionHas
    // assertSessionMissing
    // assertSessionHasAll
    // assertSessionHasErrors
    // assertSessionHasNoErrors
    // assertSessionHasErrorsIn

// ### Cookie
    // assertCookie // Cookie 存在
    // assertCookieMissing // Cookie 不存在
    // assertCookieExpired // Cookie 过期
    // assertCookieNotExpired // Cookie 没过期
    // assertPlainCookie // 未加密的 Cookie

// ### 状态码
    // assertStatus // HTTP 状态码
    // assertOk // 成功 200
    // assertNotFound // 未找到 404
    // assertSuccessful // 成功状态 禁止
    // assertForbidden // 禁止状态 禁止 400

// ### 视图
    // assertViewHas
    // assertViewHasAll
    // assertViewIs
    // assertViewMissing

// ### 认证
    // assertAuthenticated 认证
    // assertGuest 未认证
    // assertAuthenticatedAs 认证为
    // assertCredentials 凭证有效
    // assertInvalidCredentials 凭证无效
