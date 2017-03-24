<?php
require 'redis.php';
$id = $_GET['id'];
//要删除数据，需要删除哪些数据
//哈希要删除 ，链表里面的id值要删除，存储id的键要删除。
//删除一个键的语法：　$redis->del(键名称);
//根据id取出用户名称
$username = $redis->hget("user:id:".$id,'username');
$redis->del('username:'.$username);
//删除哈希
$redis->del("user:id:".$id);
//删除链表里面的一个具体的值。
$redis->lrem('userid',$id);
header("location:index.php");
?>