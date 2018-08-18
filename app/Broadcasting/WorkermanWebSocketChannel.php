<?php
namespace App\Broadcasting;

use Illuminate\Notifications\Notification;

class WorkermanWebSocketChannel { // Workerman WebSocket 消息 通知频道
    public function send($notifiable, Notification $notification) {
        $message = $notification->toWorkermanws($notifiable); // 获取消息数组
        if ( $message ) {
            $app->notice->send([ // 发送模板消息
                'touser' => $notifiable->openid,
                'template_id' => $message['template_id'],
                'url' => $message['url'],
                'data' => $message['data'],
            ]);
        } else {
            // do nothing
        }
    }
}
