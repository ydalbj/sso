<?php
namespace Jasny\SSO;

require_once __DIR__ . '/../vendor/autoload.php';

use Desarrolla2\Cache\Cache;
use Desarrolla2\Cache\Adapter\Memory;

class TestServer extends Server
{
    private static $brokers = array (
        'Alice' => array('secret'=>"Bob"),
        'Greg' => array('secret'=>'Geraldo'),
        'BrokerApi' => array('secret'=>'BrokerApi'),
        'ServerApi' => array('secret' => 'ServerApi')
    );

    private static $users = array (
        'admin' => array(
            'fullname' => 'jackie',
            'email' => 'jackie@admin.com'
        )
    );

    public function __construct()
    {
        parent::__construct();
    }

    protected function getBrokerInfo($broker)
    {
        return self::$brokers[$broker];
    }

    protected function checkLogin($username, $password)
    {
        return $username == 'admin' && $password == 'admin';
    }

    protected function getUserInfo($user)
    {
        return self::$users[$user];
    }

    // protected function createCacheAdapter() {
    //     $adapter = new Memory();
    //     $adapter->setOption('ttl', 10 * 3600);
    //     return new Cache($adapter);
    // }
}
?>