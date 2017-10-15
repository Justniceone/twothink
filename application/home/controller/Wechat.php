<?php
namespace app\home\controller;

use EasyWeChat\Message\News;
use EasyWeChat\Message\Text;
use think\Controller;
use EasyWeChat\Foundation\Application;
class Wechat extends Controller{
    private $_options=[
        'debug'  => false,
        /**
         * 账号基本信息，请从微信公众平台/开放平台获取
         */
        'app_id'  => 'wx3321909fac97ed4f',         // AppID
        'secret'  => '59549b4f6c603f0702f601c3a5265667',     // AppSecret
        'token'   => 'bopang',          // Token
        'aes_key' => '',                    // EncodingAESKey，安全模式下请一定要填写！！！
        /**
         * 日志配置
         *
         * level: 日志级别, 可选为：
         *         debug/info/notice/warning/error/critical/alert/emergency
         * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
         * file：日志文件位置(绝对路径!!!)，要求可写权限
         */
        'log' => [
            'level'      => 'debug',
            'permission' => 0777,
            'file'       => '/tmp/easywechat.log',
        ],
        /**
         * OAuth 配置
         *
         * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
         * callback：OAuth授权完成后的回调页地址
         */
        'oauth' => [
            'scopes'   => ['snsapi_userinfo'],
            'callback' => '/examples/oauth_callback.php',
        ],
        /**
         * 微信支付
         */
        'payment' => [
            'merchant_id'        => 'your-mch-id',
            'key'                => 'key-for-signature',
            'cert_path'          => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
            'key_path'           => 'path/to/your/key',      // XXX: 绝对路径！！！！
            // 'device_info'     => '013467007045764',
            // 'sub_app_id'      => '',
            // 'sub_merchant_id' => '',
            // ...
        ],
        /**
         * Guzzle 全局设置
         *
         * 更多请参考： http://docs.guzzlephp.org/en/latest/request-options.html
         */
        'guzzle' => [
            'timeout' => 3.0, // 超时时间（秒）
            'verify' => false, // 关掉 SSL 认证（强烈不建议！！！）
        ],
    ];

    public function test(){
        //验证
        $app = new Application($this->_options);
        // 从项目实例中得到服务端应用实例。
        $server = $app->server;
        $server->setMessageHandler(function ($message) {
            switch ($message->MsgType) {
                case 'event':
                    return '收到事件消息';
                    break;
                case 'text':
                    if($message->Content == '物业管理'){
                        $news = new News([
                            'title'       => '欢迎进入滟澜湖物业管理系统',
                            'description' => '滟澜湖物业',
                            'url'         => "http://twothink.9ymc.top/",
                            'image'       => 'https://pic1.ajkimg.com/display/hj/e48d47a16f27d8c0d00e4e26199216dc/600x450c.jpg?t=1',
                            // ...
                        ]);
                        return $news;
                    }elseif ($message->Content == '消息'){
                        $news = new News([
                            'title'       => '最新小区通知',
                            'description' => '最新通知',
                            'url'         => "http://twothink.9ymc.top/home/index/notice.html",
                            'image'       => 'https://pic1.ajkimg.com/display/hj/e48d47a16f27d8c0d00e4e26199216dc/600x450c.jpg?t=1',

                        ]);
                        return $news;
                    }elseif ($message->Content == '帮助'){
                        $text=new Text(['content'=>'输入物业管理进入物业管理系统 输入消息获取小区通知 输入"搜索+条件"获取附件商家信息']);
                        return $text;
                    }elseif (mb_substr($message->Content,0,2,'utf-8') == '搜索'){
                        $keyword=mb_substr($message->Content,2,10,'utf-8');
                        //判断是否发送过位置信息
                        $redis=new \Redis();
                        $redis->connect('127.0.0.1');
                        $location=$redis->get('location_'.$message->FromUserName);
                        if($location){
                            //调用百度地图API查询
                            $articles = [];
                            //调用baidu地图api接口获取商家信息
                            $url = "http://api.map.baidu.com/place/v2/search?query={$keyword}&page_size=8&page_num=0&scope=2&location={$location}&radius=2000&output=xml&ak=oIMmdxR9XOnmdX7TGXWqbV92OiXrFxpT";
                            $xml = simplexml_load_file($url);
                            //解析xml
                            $results = $xml->results;
                            if(count($results->result)==0){
                                $keyword = '没有查询到'.$keyword;
                                return $keyword;
                            }else{
                                foreach ($results->result as $result){
                                    $news = new News([
                                        'title'       => (string)$result->name,
                                        'description' => '...',
                                        'url'         => (string)$result->detail_info->detail_url,
                                        'image'       => 'http://p0.meituan.net/tdchotel/7b0ae32c3e10ce59ed364b09be1ecb4b637577.png@368w_208h_1e_1c',
                                    ]);
                                    $articles[]=$news;
                                }
                                return $articles;
                            }

                        }else{
                            return '请先发送位置信息';
                        }
                    }
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    //return '收到坐标消息';
                    //保存位置信息到Redis中
                    $redis=new \Redis();
                    $redis->connect('127.0.0.1');
                    $redis->set('location_'.$message->FromUserName,$message->Location_X.','.$message->Location_Y);
                    return '请输入查询条件';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
            // ...
        });
        $response = $server->serve();
        $response->send(); // Laravel 里请使用：return $response;
    }

    public function setmenu()
    {
        //设置菜单
        $app = new Application($this->_options);
        $menu = $app->menu;
        $buttons = $buttons = [
            [
                "type" => "click",
                "name" => "导航",
                "key"  => "Navigation",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "小区通知",
                        "url"  => "http://twothink.9ymc/home/index/notice.html"
                    ],
                    [
                        "type" => "view",
                        "name" => "便民服务",
                        "url"  => "http://twothink.9ymc/home/service/index.html"
                    ],
                    [
                        "type" => "view",
                        "name" => "在线报修",
                        "url"  => "http://twothink.9ymc/home/index/online.html"
                    ],
                    [
                        "type" => "view",
                        "name" => "商家活动",
                        "url"  => "http://twothink.9ymc/home/shop/index.html"
                    ],
                    [
                        "type" => "view",
                        "name" => "小区租售",
                        "url"  => "http://twothink.9ymc/home/sale/index.html"
                    ],
                ]
            ],
            [
                "name"       => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "首页",
                        "url"  => "http://twothink.9ymc"
                    ],
                    [
                        "type" => "view",
                        "name" => "服务",
                        "url"  => "http://twothink.9ymc/home/service/discovery.html"
                    ],
                    [
                        "type" => "view",
                        "name" => "发现",
                        "url" => "http://twothink.9ymc/home/service/discovery.html"
                    ],
                    [
                        "type" => "click",
                        "name" => "活动",
                        "key" => "Activity"
                    ],
                    [
                        "type" => "view",
                        "name" => "个人中心",
                        "url" => "http://twothink.9ymc/home/service/center.html"
                    ],
                ],
            ],
        ];
        $menu->add($buttons);
    }

    public function getmenu(){
        $app = new Application($this->_options);
        $menu = $app->menu;
        $menus = $menu->all();
        print_r($menus);
    }
}