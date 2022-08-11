<?php
namespace Syjbd\SyRedis\lib;

use Syjbd\SyRedis\RedisConnect;

class RedisBase {

    protected $key= 'default';
    protected \Redis $redis;

    public function __construct($key="", $alias='local')
    {

        $this->key = $key;
        $this->redis = RedisConnect::getRedis($alias);
    }

    public function getConnect(): array
    {
        return ['host' => $this->redis->getHost(), 'port'=>$this->redis->getPort()];
    }

    public function exists(){
        return $this->redis->exists($this->key);
    }

    public function expire($ttl){
        return $this->redis->expire($this->key, $ttl);
    }

    public function keys(){
        return $this->redis->keys($this->key);
    }

}