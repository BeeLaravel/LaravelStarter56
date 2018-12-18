<?php
namespace App\Logics\Wechat\Personal;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;

use GuzzleHttp\Client;

class Http extends AbstractMessageHandler {
    public $name = 'http';
    public $zhName = 'guzzle 服务';
    public $version = '1.0';
    public $author = 'JaQuan';

    public static $client = null;

    public function register() {
        static::$client = new Client();
    }
    public function handler(Collection $message) {}

    public static function request($method, $uri='', array $options=[], $origin=false) {
        $options = array_merge([
            'timeout' => 10,
            'verify' => false
        ], $options);

        $response = static::$client->request($method, $uri, $options);

        return $origin ? $response : $response->getBody()->getContents();
    }
}
