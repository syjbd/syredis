<?php
namespace Syjbd\SyRedis;

class RedisConnect{

    /**
     * 定义一个对象池
     * @var array
     */
    private static array $connections = [];

    /**
     * 定义redis配置文件
     * @var array
     */
    private static array $servers = [];

    /**
     * 定义添加redis配置方法
     * @param $conf
     */
    public static function addServer($conf)
    {
        self::$servers = $conf;
    }

    /**
     * 两个参数要连接的服务器KEY,要选择的库
     * @param $alias
     * @param int $select
     * @return \Redis
     */
    public static function getRedis($alias, int $select = 0): \Redis
    {
        if(!array_key_exists($alias,self::$connections)){  //判断连接池中是否存在
            $redis = new \Redis();
            $redis->connect(self::$servers[$alias]['host'],self::$servers[$alias]['port']);
            self::$connections[$alias]=$redis;
            if(isset(self::$servers[$alias]['pwd']) && self::$servers[$alias]['pwd']!=""){
                self::$connections[$alias]->auth(self::$servers[$alias]['pwd']);
            }
        }
        self::$connections[$alias]->select($select);
        return self::$connections[$alias];
    }
}