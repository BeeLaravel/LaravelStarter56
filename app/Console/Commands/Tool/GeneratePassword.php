<?php

namespace App\Console\Commands\Tool;

use Illuminate\Console\Command;

class GeneratePassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tool:generatepassword
        {--length=10 : Password Length}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Password';

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
        $password = "";

        $candidate = <<<EOT
ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789,./;'[]\-=<>?:"{}|_+!@#$%^&*()~`
EOT;
        $candidate_length = strlen($candidate);
        $length = $this->option('length');
        
        for ( $i=0; $i<$length; $i++ ) {
            $position = rand(0, $candidate_length-1);
            $password .= $candidate[$position];
        }

        echo $password;
    }
}
