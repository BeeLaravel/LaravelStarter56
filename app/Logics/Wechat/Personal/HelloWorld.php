<?php
namespace App\Logics\Wechat\Personal;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;
use Hanson\Vbot\Message\Text;

class HelloWorld extends AbstractMessageHandler {
	public $name = 'hello';
	public $zhName  = '你好';
	public $version = '1.0';
	public $author = 'BeeSoft';

	public $status = true;

	public function register() {}
	public function handler(Collection $collection) {
	    if ( $collection['type'] === 'text' && $collection['content'] === 'hello' ) { // 文本消息 hello
	        if ( ($collection['fromType'] === 'Group' && $collection['isAt']) || $collection['fromType'] === 'Friend' ) { // 好友 群聊中 at
	            return Text::send($collection['from']['UserName'], 'world');
	        }
	    }
	}
}
