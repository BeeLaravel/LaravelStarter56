<?php
namespace App\Logics\Wechat\Personal;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;

use Predis\Client;
use Redis;

class Blacklist extends AbstractMessageHandler {
    public $name = 'blacklist';
    public $zhName = '黑名单';
    public $version = '1.0.1';
    public $author = 'HanSon';

    private $cache;
    private $frequencyPrefix = 'vbot.blacklist.frequency.';
    private $prefix = 'vbot.blacklist.';
    public $status = true;
    private $configs;

    public function register() {
        $this->configs = vbot('config')->get('extension.'.$this->name);
        $this->cache = new Client([
            'host' => vbot('config')->get('database.redis.default.host'),
            'port' => vbot('config')->get('database.redis.default.port'),
            'password' => vbot('config')->get('database.redis.default.password'),
            'database' => vbot('config')->get('database.redis.default.database'),
        ]);
    }
    public function handler(Collection $message) {
        if ( !in_array($message['type'], $this->configs['type']) ) return false;

        if ( $this->cache->get($this->prefix.$message['type'].$message['username']) ) return true;

        $key = $this->frequencyPrefix.$message['type'].$message['username'];
        $count = $this->cache->get($key) + 1;
        $this->cache->set($key, $count);
        $this->cache->expire($key, 10);

        if ( $count == 5 ) $this->warn($message);

        if ( $count >= 8 ) {
            $this->block($message);
            return true;
        }
    }

    private function warn($message) {
        if ( is_callable($callable = $this->configs['warn']) ) call_user_func_array($callable, [$message]);
    }
    private function block($message) {
        if ( $this->cache->get($this->prefix.$message['type'].$message['username']) ) return true;

        $this->cache->set($this->prefix.$message['type'].$message['username'], 1);

        if ( is_callable($callable = $this->configs['block']) ) call_user_func_array($callable, [$message]);
    }
}
