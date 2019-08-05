<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

use App\Events\OrderCreated;
use App\Events\OrderShipped; // 订单派送成功
use App\Mail\OrderShipped;
use App\Notifications\OrderShipped;
use App\Events\OrderFailedToShip; // 订单派送失败

use App\Order; // 模型
use App\Jobs\ShipOrder; // 工作

use Illuminate\Http\UploadedFile; // 文件上传

class FackerTest extends \Tests\TestCase {
    public function testBus() { // 任务 Bus
        Bus::fake();

        Bus::assertDispatched(ShipOrder::class, function ($job) use ($order) {
            return $job->order->id === $order->id;
        });
        Bus::assertNotDispatched(AnotherJob::class);
    }
    public function testOrderShipping() { // 事件 Event
        Event::fake();

        Event::assertDispatched(OrderShipped::class, function ($e) use ($order) {
            return $e->order->id === $order->id;
        });
        Event::assertDispatched(OrderShipped::class, 2); // 2 次
        Event::assertNotDispatched(OrderFailedToShip::class);
    }
    public function testEvent() { // 事件 Event fakeFor
        $order = Event::fakeFor(function(){
            $order = factory(Order::class)->create();

            Event::assertDispatched(OrderCreated::class);

            return $order;
        });

        $order->update([]);
    }
    public function testMail() { // 邮件 Mail
        Mail::fake();

        Mail::assertSent(OrderShipped::class, function ($mail) use ($order) {
            return $mail->order->id === $order->id;
        });
        Mail::assertSent(OrderShipped::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email) &&
                $mail->hasCc('...') &&
                $mail->hasBcc('...');
        });
        Mail::assertSent(OrderShipped::class, 2); // 发送两封邮件
        Mail::assertNotSent(AnotherMailable::class); // 断言没有发送邮件
        // Mail::assertQueued();
        // Mail::assertNotQueued();
    }
    public function testNotification() { // 通知 Notification
        Notification::fake();

        Notification::assertSentTo( // 发送
            $user,
            OrderShipped::class,
            function ($notification, $channels) use ($order) {
                return $notification->order->id === $order->id;
            }
        );
        Notification::assertSentTo(
            [$user], OrderShipped::class
        );
        Notification::assertNotSentTo( // 不发送
            [$user], AnotherNotification::class
        );
    }
    public function testQueue() { // 事件 Queue
        Queue::fake();

        Queue::assertPushed(ShipOrder::class, function ($job) use ($order) {
            return $job->order->id === $order->id;
        }); // 入栈
        Queue::assertPushedOn('queue-name', ShipOrder::class);
        Queue::assertPushed(ShipOrder::class, 2); // 入栈 2 次
        Queue::assertNotPushed(AnotherJob::class); // 没有入栈
    }
    public function testStorage() { // 存储 Storage
        Storage::fake('avatars');

        $response = $this->json('POST', '/avatar', [
            'avatar' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        Storage::disk('avatars')->assertExists('avatar.jpg'); // 存在文件
        Storage::disk('avatars')->assertMissing('missing.jpg'); // 不存在文件
    }
    public function testCache() { // Facades Cache
        Cache::shouldReceive('get')
            ->once()
            ->with('key') // 键
            ->andReturn('value'); // 返回

        $response = $this->get('/users');
    }
}
