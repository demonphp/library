<?php
require 'redis.php';
$id = $_GET['id'];//被关注的id
session_start();
$ownid= $_SESSION['user_id'];//自己的id
//构造集合的键
$key = 'myguan:'.$ownid;
$redis->sadd($key,$id);
header("location:index.php");

?>