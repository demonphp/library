<?php

   /*
    +-------------------------------
    *    @socket连接整个过程
    +-------------------------------
    *    @socket_create
    *    @socket_connect
    *    @socket_write
    *    @socket_read
    *    @socket_close
    +--------------------------------
    */

    error_reporting(E_ALL);
    set_time_limit(0);

    //1.设置ip与端口
    $port = 1935;
    $ip = "127.0.0.1";

    //2.创建socket
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket < 0) {
        echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
    }else {
        echo "OK.\n";
    }

    echo "试图连接 '$ip' 端口 '$port'...\n";
    //3.连接到服务端
    $result = socket_connect($socket, $ip, $port);
    if ($result < 0) {
        echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
    }else {
        echo "连接OK\n";
    }

    $in = "hello server";       //定义向服务器接收到的消息
    $out = '';

    //4.写入服务端socket向(服务器发送消息)
    if(!socket_write($socket, $in, strlen($in))) {
        echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
    }else {
        echo "send message to server:$in\n";
    }

    //5.阅读来自服务端的响应(从服务器接收信息)
    while($out = socket_read($socket, 8192)) {
        echo "receive message form server:".$out;
    }

    //6.关闭socket
    socket_close($socket);
