<?php
namespace App\Console\Commands\Server;

class WebSocket extends Command {
    protected $signature = 'server:websocket';
    protected $description = 'WebSocket Server [Swoole[default]|Workerman]';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        echo "server:websocket";
    }
}
