<?php
namespace App\Logics\Wechat\Personal;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;
use Hanson\Vbot\Console\Console;
use Hanson\Vbot\Message\Text;
use Hanson\Vbot\Support\File;
use Hanson\Vbot\Message\Image;

use Symfony\Component\DomCrawler\Crawler;

class HotGirl extends AbstractMessageHandler {
    public $name = 'hot_girl';
    public $zhName = '辣妹图';
    public $version = '1.0.3';
    public $author = 'JaQuan';

    public $baseExtensions = [
        Http::class,
    ];
    private static $target = 'http://www.mmjpg.com';
    private static $http_config = [
        'timeout' => 10.0,
        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
        ],
    ];
    private static $crawler = null;

    public function register() {
        static::$crawler = new Crawler();

        $default_config = [
            'keyword'       => '妹子',
            'image_path'    => vbot('config')['user_path'].'girls/',
            'error_message' => '暂时无法为您提供服务！',
        ];

        $this->config = array_merge($default_config, $this->config);
    }
    public function handler(Collection $message) {
        if ( $message['type'] === 'text' && $message['pure'] == $this->config['keyword'] ) {
            $username = $message['from']['UserName'];

            $number = random_int(1, 1054);

            try {
                $response = Http::request('GET', static::$target.'/mm/'.$number, static::$http_config);

                # 解析页码获得文章内最大页数
                static::$crawler->clear();
                static::$crawler->addHtmlContent($response);

                $page_links = static::$crawler->filter('#page>a');

                $last_page = (int) $page_links->eq($page_links->count() - 2)->html();

                # 获取随机 ID 中随机页数据
                $uri = static::$target.'/mm/'.$number.'/'.random_int(1, $last_page);
                $response = Http::request('GET', $uri, static::$http_config);

                # 解析页码获得文章内大图地址
                static::$crawler->clear();
                static::$crawler->addHtmlContent($response);

                $image_src = static::$crawler->filter('#content>a>img')->attr('src');

                $response = Http::request('GET', $image_src, static::$http_config);

                # 存储图片至本地
                $file_path = $this->config['image_path'].md5($image_src).'.jpg';
                File::saveTo($file_path, $response);

                return Image::send($username, $file_path);
            } catch (\Exception $e) {
                vbot('console')->log($e->getMessage(), Console::ERROR);

                return Text::send($username, $this->config['error_message']);
            }
        }
    }
}
