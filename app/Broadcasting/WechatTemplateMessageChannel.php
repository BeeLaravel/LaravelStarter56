<?php
namespace App\Broadcasting;

use Illuminate\Notifications\Notification;

class WechatTemplateMessageChannel { // 微信模版消息 通知频道
    public function send($notifiable, Notification $notification) {
        $message = $notification->toWechatpl($notifiable); // 获取消息数组
        if ( $message && $notifiable->openid ) {
            $app = officialaccount(1); // 创建公众号实例

            try {
                $app->notice->send([ // 发送模板消息
                    'touser' => $notifiable->openid,
                    'template_id' => $message['template_id'],
                    'url' => $message['url'],
                    'data' => $message['data'],
                ]);
            } catch ( \Exception $e ) {
                log_file(array_merge($message, ['openid' => $notifiable->openid]), "发送模板消息 发生 " . $e->getMessage() . " 错误 在文件 " . $e->getFile() . " 行 " . $e->getLine(), "exception.log");
            }
        } else {
            // do nothing
        }
    }
}
