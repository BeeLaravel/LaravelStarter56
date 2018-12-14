<?php
namespace App\Console\Commands\Server;

class WebSockets extends Command {
    protected $signature = 'server:websockets';
    protected $description = 'WebSocket SSL Server [Swoole[default]|Workerman]';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        echo "server:websockets";
    }
}
