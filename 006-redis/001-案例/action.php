<?php
    require_once 'common/base.php';

    $act = isset($_GET['act'])? $_GET['act']: '';

    if($act=='reg'){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $age      = trim($_POST['age']);

        $user_res = $redis->get($conf['main_user_username'].$username);//在存储之前，验证一下用户名是否存在。
        if($user_res) {
            die('该用户名已经被注册,请登录');
        }

        //1.生成自增的id
        $id = $redis->incr($conf['main_user_id']);
        //2.储存username与id的关系
        $redis->set($conf['main_user_username'].$username,$id);

        //3.储存main_user表
        //3.1构建哈希的键
        $key  = $conf['main_user'].$id;
        //3.2数据存储成哈希
        $redis->hmset($key,array('id'=>$id,'username'=>$username,'password'=>$password,'age'=>$age));
        //把用户的 id存储到链表里面。
        $redis->lpush($conf['main_user_count'],$id);
        header("location:login.php");
    }elseif($act=='login'){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        //要根据用户名，找出id
        $id = $redis->get($conf['main_user_username'].$username);//取出存储的id
        if(!$id){
            die('你输入的用户名有误');
        }
        //根据id拼接哈希的键
        $key  = $conf['main_user'].$id;
        //在哈希里面取出密码字段。
        $password1 = $redis->hget($key,'password');
        if($password !=$password1 ){
            die('你输入的用户名或密码有误');
        }

        //合法的用户，
        $_SESSION['username'] = $username;
        $_SESSION['user_id']  = $id;
        header("location:index.php");
    }
