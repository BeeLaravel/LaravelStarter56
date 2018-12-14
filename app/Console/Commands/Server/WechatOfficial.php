<?php
namespace App\Console\Commands\Server;

class WechatOfficial extends Command {
    protected $signature = 'server:wechatofficial';
    protected $description = 'Wechat Official Server [Swoole[default]|Workerman]';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        echo "server:wechatofficial";
    }
}
