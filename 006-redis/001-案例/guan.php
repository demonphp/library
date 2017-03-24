<?php
    require_once 'common/base.php';
    $id = $_GET['id'];//被关注的id
    $ownid= $_SESSION['user_id'];//自己的id
    //构造集合的键

    $key = $conf['main_user_friend'].$ownid;
//    $redis->sadd($key,$id);     //无序
    $sorce = $redis->incr('main_user_friend_sorce:'.$ownid);
    $redis->zadd($key,$sorce,$id);     //有序
//var_dump(111);
    header("location:index.php");

