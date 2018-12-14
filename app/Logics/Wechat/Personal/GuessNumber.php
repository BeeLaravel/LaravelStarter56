<?php
namespace App\Logics\Wechat\Personal;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;
use Hanson\Vbot\Message\Text;

class GuessNumber extends AbstractMessageHandler {
    public $name = 'guess_number';
    public $zhName = '猜数字';
    public $version = '1.0';
    public $author = 'HanSon';

    private static $array = [];

    public function register() {}
    public function handler(Collection $message) {
        if ( $message['type'] === 'text' && $message['fromType'] === 'Group' ) { // 群聊-文本
            $username = $message['from']['UserName'];
            $isBegin = isset(static::$array[$username]);

            if ( $message['pure'] === '猜数字' ) { // 文本内容 猜数字
                if ( $isBegin ) {
                    Text::send($username, '猜数字已经开始，还没结束呢');
                    Text::send($username, '当前区间为：' . static::$array[$username]['begin'] . ' 到 ' . static::$array[$username]['end']);
                } else {
                    Text::send($username, '猜数字开始，请猜一个 1 ~ 99 的数字，中了就赢了哦');

                    static::$array[$username] = [
                        'begin' => 0,
                        'end' => 100,
                        'target' => random_int(1, 99),
                    ];
                }
            } elseif ( is_numeric($message['content']) && $isBegin ) { // 文本内容 数字 首次
                $message['content'] = intval($message['content']);
                $target = static::$array[$username]['target']; // 答案

                if ( $message['content'] > static::$array[$username]['begin'] && $message['content'] < static::$array[$username]['end'] ) {
                    if ( $message['content'] == $target ) {
                        Text::send($username, $message['sender']['NickName'] . '你赢了！数字就为：' . static::$array[$username]['target']);

                        unset(static::$array[$username]);
                    } elseif ( $message['content'] > $target ) {
                        Text::send($username, '当前区间为：'.static::$array[$username]['begin'].' 到 '.$message['content']);

                        static::$array[$username]['end'] = $message['content'];
                    } else {
                        Text::send($username, '当前区间为：'.$message['content'].' 到 '.static::$array[$username]['end']);

                        static::$array[$username]['begin'] = $message['content'];
                    }
                }
            }
        }
    }
}
