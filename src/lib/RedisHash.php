<?php
namespace Syjbd\SyRedis\lib;

class RedisHash extends RedisBase {

    public function hDel($hashKey1, ...$otherHashKeys){
        return $this->redis->hDel($this->key, $hashKey1, ...$otherHashKeys);
    }

    public function hExists($hashKey): bool
    {
        return $this->redis->hExists($this->key,$hashKey);
    }

    public function hGet($hashKey){
        return $this->redis->hGet($this->key,$hashKey);
    }

    public function hGetAll(): array
    {
        return $this->redis->hGetAll($this->key);
    }

    public function hIncrBy($hashKey, $value): int
    {
        return $this->redis->hIncrBy($this->key, $hashKey, $value);
    }

    public function hIncrByFloat($hashKey, $value): float
    {
        return $this->redis->hIncrByFloat($this->key,$hashKey, $value);
    }

    public function hKeys(): array
    {
        return $this->redis->hKeys($this->key);
    }

    public function hLen(){
        return $this->redis->hLen($this->key);
    }

    public function hMGet($hashKeys): array
    {
        return $this->redis->hMGet($this->key, $hashKeys);
    }

    public function hMSet($hashKeys): bool
    {
        return $this->redis->hMSet($this->key, $hashKeys);
    }

    public function hSet($hashKey, $value){
        return $this->redis->hSet($this->key, $hashKey, $value);
    }

    public function hSetNx($hashKey, $value): bool
    {
        return $this->redis->hSetNx($this->key, $hashKey, $value);
    }

    public function hVals(): array
    {
        return $this->redis->hVals($this->key);
    }

    public function hScan( &$iterator, $pattern = null, $count = 0): array
    {
        return $this->redis->hScan($this->key, $iterator, $pattern = null, $count = 0);
    }

    public function del(): int
    {
        return $this->redis->del($this->key);
    }
}