<?php
require 'redis.php';
$act = isset($_GET['act'])?$_GET['act']:'';
if($act=='reg'){
        //完成用户 注册处理
        //接收传递的用户名和密码和年龄
        $username = $_POST['username'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        //生成自增的id
        $id = $redis->incr('id');
        //构建哈希的键
        $key  = "user:id:".$id;
        //数据存储成哈希
        $redis->hmset($key,array('id'=>$id,'username'=>$username,'password'=>$password,'age'=>$age));
        //要把用户名和id的关系存储起来，便于在登录时验证
       // 我们使用string类型来存储该关系      'username:'.$username 作为字符串的键，值为id
       //$redis->get('username:'.$username);//在存储之前，验证一下用户名是否存在。
       $redis->set('username:'.$username,$id);
       //把用户的 id存储到链表里面。
       $redis->lpush('userid',$id);
        header("location:index.php");
}elseif($act=='login'){
        //处理登录的程序
        //接收输入的用户名和密码
        $username = $_POST['username'];
        $password = $_POST['password'];
        //要根据用户名，找出id
        $id = $redis->get('username:'.$username);//取出存储的id
        if(!$id){
            die('你输入的用户名有误');
        }
       //根据id拼接哈希的键
        $key  = "user:id:".$id;
        //在哈希里面取出密码字段。
        $password1 = $redis->hget($key,'password');
        //判断取出的密码和输入的密码是否一致
        if($password==$password1){
                //合法的用户，
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['user_id']=$id;
                 header("location:index.php");
        }else{
            die('你输入的用户名或密码有误');
        }
}
