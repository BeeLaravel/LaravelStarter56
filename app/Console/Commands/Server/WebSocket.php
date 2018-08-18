<?php

namespace App\Console\Commands\Server;

use Illuminate\Console\Command;

class WebSocket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:websocket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'WebSocket Server [Swoole[default]|Workerman]';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "server:websocket";
    }
}
