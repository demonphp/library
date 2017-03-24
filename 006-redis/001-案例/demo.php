<?php
$redis  = new Redis();
$redis->connect('192.168.21.250',6379);
$redis->auth('guangzhou');
//添加一个键值
$redis->set('username','xiaopengyou');
echo 'ok';
?>