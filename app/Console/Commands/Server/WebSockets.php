<?php

namespace App\Console\Commands\Server;

use Illuminate\Console\Command;

class WebSockets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:websockets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'WebSocket SSL Server [Swoole[default]|Workerman]';

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
        echo "server:websockets";
    }
}
