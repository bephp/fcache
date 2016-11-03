<?php
function fcache ($cachedir='/tmp/', $expire=100){
    return function ($key, $val=null, $exp=100) use ($cachedir, $expire){
        $timestamp = time();
        $name = $cachedir. $key. '-'. md5($key);
        $expire = $exp || $expire;
        if ($name && $val && $expire){
            @file_put_contents($name, serialize($val), LOCK_EX);
            @touch($name, $timestamp + $expire);
            return $val;
        }
        return file_exists($name) && @filemtime($name) > $timestamp
            && ($data=unserialize(@file_get_contents($name))) ? $data : null;
    };
}
