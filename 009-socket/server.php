<?php

   /*
    +-------------------------------
    *    @socket通信整个过程
    +-------------------------------
    *    @socket_create
    *    @socket_bind
    *    @socket_listen
    *    @socket_accept
    *    @socket_read
    *    @socket_write
    *    @socket_close
    +--------------------------------
    */

    //确保在连接客户端时不会超时
    set_time_limit(0);

    //1.设置ip地址和端口
    $ip = '127.0.0.1';
    $port = 1935;

    //2.创建socket
    if(($sock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) < 0) {
        echo "socket_create() 失败的原因是:".socket_strerror($sock)."\n";
    }

    //3.绑定socket
    if(($ret = socket_bind($sock,$ip,$port)) < 0) {
        echo "socket_bind() 失败的原因是:".socket_strerror($ret)."\n";
    }

    //4.监听socket
    if(($ret = socket_listen($sock,4)) < 0) {
        echo "socket_listen() 失败的原因是:".socket_strerror($ret)."\n";
    }

    $count = 0;
    do {
        //接受一个Socket连接,接收失败
        if (($msgsock = socket_accept($sock)) < 0) {
            echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n";
            break;
        } else {

            //发到客户端
            $msg ="hello client i receive\n";
            //写数据到socket缓存
            socket_write($msgsock, $msg, strlen($msg));

            //echo $msg;
            //读取指定长度的数据
            $buf = socket_read($msgsock,8192);

            $talkback = "receive client msg:$buf\n";
            echo $talkback;

            if(++$count >= 5){
                break;
            };


        }
        //echo $buf;
        socket_close($msgsock);

    } while (true);

    //关闭socket
    socket_close($sock);
