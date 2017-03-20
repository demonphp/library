<?php
    //1.初始化，创建一个新cURL资源
    $ch = curl_init();

    //2.设置URL和相应的选项
    curl_setopt($ch, CURLOPT_URL, "http://www.lampbrother.net/");
    curl_setopt($ch, CURLOPT_HEADER, 0);

    //3.抓取URL并把它传递给浏览器
    $res = curl_exec($ch);

    //4.关闭cURL资源，并且释放系统资源
    curl_close($ch);

    var_dump($res);
