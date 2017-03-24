<?php
    require_once 'common/base.php';
    $id = $_GET['id'];
    //要删除数据，需要删除哪些数据
    //哈希要删除 ，链表里面的id值要删除，存储id的键要删除。
    //删除一个键的语法：　$redis->del(键名称);
    //根据id取出用户名称
    $username = $redis->hget($conf['main_user'].$id,'username');
    $redis->del($conf['main_user_username'].$username);
    //删除哈希
    $redis->del($conf['main_user_id'].$id);
    //删除链表里面的一个具体的值。
    $redis->lrem($conf['main_user_count'],$id);
    header("location:index.php");
