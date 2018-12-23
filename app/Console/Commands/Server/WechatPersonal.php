<?php
namespace App\Console\Commands\Server;

use Illuminate\Support\Collection;

use Hanson\Vbot\Foundation\Vbot;
// 消息
use Hanson\Vbot\Message\Text;
// 扩展
// use App\Logics\Wechat\Personal\HelloWorld;
// use Vbot\GuessNumber\GuessNumber; // 猜数字
// use Vbot\Blacklist\Blacklist; // 黑名单
// use Vbot\Express\Express; // 快递
// use Vbot\FindMovies\FindMovies; // 找电影
use Vbot\HotGirl\HotGirl; // 辣妹图
// use Vbot\Tuling\Tuling; // 图灵

class WechatPersonal extends Command {
    protected $signature = 'server:wechatpersonal';
    protected $description = 'Wechat Personal Server [Swoole[default]|Workerman]';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        $vbot = new Vbot(config('wechat_personal'));

        // 消息处理器
		// $vbot->messageHandler->setHandler(function(Collection $message){
		//     Text::send($message['from']['UserName'], 'hi');
		// });
		$vbot->messageHandler->setCustomHandler(function(){
		    Text::send('filehelper', date('Y-m-d H:i:s'));
		});

		// 事件监听器
		$vbot->observer->setQrCodeObserver(function($qrCodeUrl){ // 二维码
		    
		});
		$vbot->observer->setLoginSuccessObserver(function(){ // 登录成功
		    
		});
		$vbot->observer->setReLoginSuccessObserver(function(){ // 免扫码成功
		    
		});
		$vbot->observer->setExitObserver(function(){ // 程序退出
		    
		});
		$vbot->observer->setFetchContactObserver(function(array $contacts){ // 好友

		});
		$vbot->observer->setBeforeMessageObserver(function(){ // 消息处理前

		});
		$vbot->observer->setNeedActivateObserver(function(){ // 异常监听器
		    
		});

		// 扩展
		$vbot->messageExtension->load([
		    // Blacklist::class,
		    // HelloWorld::class,
		    // GuessNumber::class,
		    // Express::class,
		    // FindMovies::class,
		    HotGirl::class,
		    // Tuling::class,
		]);

		// $friends = vbot('friends');
		// $groups = vbot('groups');
		// $members = vbot('members');
		// $officials = vbot('officials');
		// $specials = vbot('specials');
		// $myself = vbot('myself');

		// $friends->getUsernameByNickname($nickname, $blur = false); // 根据昵称获取
		// $friends->getUsernameByRemarkName($remark, $blur = false); // 根据备注获取

		// $friends->getUsername($search, $key, $blur=false);
		// $friends->getAccount($username); // 根据 UserName 获取联系人

		// $groups->get($username);
		// $data = $groups->getAvatar($username); // 头像
		// file_put_content('avatar.jpg', $data);

		// // 好友
		// $friends->setRemarkName($username, $remarkName); // 备注
		// $friends->setStick($username, $isStick=true); // 置顶

		// $friends->add($username, $content=null); // 请求加好友
		// $friends->approve($message); // 同意好友请求

		// // 群
		// $groups->setGroupName($group, $name) // 设置群名称

		// $groups->getGroupsByNickname($nickname, $blur=false); // 根据昵称获取群联系人
		// $groups->getObject($nickname, 'NickName', $blur);
		// $groups->getMembersByNickname($groupUsername, $memberNickname, $blur=false) // 根据昵称搜索群成员

		// $groups->create(array $contacts) // 创建群聊
		// $groups->addMember($groupUsername, $members) // 增加群成员
		// $groups->deleteMember($groupUsername, $members) // 删除群成员

		$vbot->server->serve();
    }
}

