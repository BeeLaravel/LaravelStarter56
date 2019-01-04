<?php
namespace App\Console\Commands\Server;

class WebSocket extends Command {
    protected $signature = 'server:websocket';
    protected $description = 'WebSocket Server [Swoole[default]|Workerman]';

    protected $redis;

    public function __construct() {
        parent::__construct();

        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1', 6379);
    }

    public function handle() {
		$server = new \swoole_websocket_server("0.0.0.0", config('beesoft.websocket.port'));
        $server->set([
            // 'worker_num' => 4, // 进程数
            // 'daemonize' => 1, // 守护进程
            'log_file' => storage_path('logs/swoole_ws.log'), // 日志文件
        ]);

        $server->on('Open', function($server, $req) { // 连接打开
            echo "连接建立：标识 " . $req->fd . "\n";

            $this->redis->sAdd('fd', $req->fd);
        });
        $server->on('Close', function($server, $fd) { // 连接关系
            echo "连接关闭：标识 " . $fd . "\n";

            $this->redis->sRem('fd', $fd);
        });
        $server->on('Message', function($server, $frame) { // 收到消息
            echo "收到消息：" . $frame->data . "\n";

            $fds = $this->redis->sMembers('fd');
            foreach ( $fds as $fd ) {
                $server->push($fd, "标识 " . $frame->fd . '：' . $frame->data);
            }
        });

        $server->start();
    }
}
