<?php
class MetingCache implements MetingCacheI
{
    private $redis = null;
    public function __construct($option)
    {
        $this->redis = new Redis();
        $this->redis->connect($option['host'], $option['port']);
    }
    public function install()
    {
    }
    public function set($key, $value, $expire = 86400)
    {
        return $this->redis->set($key, $value, $expire);
    }
    public function get($key)
    {
        return $this->redis->get($key);
    }
    public function flush()
    {
        return $this->redis->flushDb();
    }
    public function check()
    {
        $number = uniqid();
        $this->set('check', $number, 60);
        $cache = $this->get('check');
        if ($number != $cache) {
            throw new Exception('Cache Test Fall!');
        }
    }
}
