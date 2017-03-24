<?php

    //1.开启session
    session_start();

    //2.设置redis常用的key,field用作说明，在代码中暂时未用到
    $conf = [
        //main_user 哈希表
        'main_user' => 'main_ha_user:id:', //再接id
        'main_user_field' => [
            'id',               //自增id
            'username',         //用户名
            'password',         //密码hash函数加密
            'age',              //年龄
            'created_at',       //注册时间
            'updated_at',       //更新时间
        ],

        //main_user_id    string user与user_id关联,自增id
        'main_user_id' => 'main_st_user_id',
        'main_uesr_id_field' => [
          'id'      //自增id,每次刷新该id进行main_user表id的自增
        ],

        //main_user_username    string user与username表关联
        'main_user_username' => 'main_st_user_username:',//再接用户名
        'main_user_username_field' => [
           'id',        //存储main_user表id
        ],

        //统计表
        'main_user_count' => 'main_ls_user_count',
        'main_user_count_field' => [
            'id',
        ],

        'main_user_friend' => 'main_zs_user_friend:',
    ];

    //3.连接redis
    $redis = new Redis();
    $redis->connect('127.0.0.1',6379);
    //$redis->auth('password');

