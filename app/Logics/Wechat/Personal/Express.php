<?php
namespace App\Logics\Wechat\Personal;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;
use Hanson\Vbot\Message\Text;

use Qbhy\Express\Express as QbhyExpress;

class Express extends AbstractMessageHandler {
    public $name = 'express';
    public $zhName = '快递查询';
    public $version = '1.0';
    public $author = '96qbhy';

    public function register() {}
    public function handler(Collection $message) {
        if ( $message['type'] === 'text' and strpos($message['content'], '查快递 ') === 0 and strlen($message['content']) > 4 ) { // 文本 查快递 postId
            $postId = str_replace('查快递 ', '', $message['content']);
            $username = $message['from']['UserName'];

            $result = QbhyExpress::query($postId);

            if ( is_string($result) ) {
                return Text::send($username, $result);
            } else if ( $result['status'] === 6 ) {
                $str = "快递单号: $postId, 快递公司: $result[company]" . PHP_EOL;

                foreach ( $result['data'] as $item ) {
                    $str .= '| ' . $item['context'] . ' - ' . $item['time'] . PHP_EOL;
                }

                return Text::send($username, $str);
            } else {
                return Text::send($username, $result['reason']);
            }
        } else {
            return null;
        }
    }
}
