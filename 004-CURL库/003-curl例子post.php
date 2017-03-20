<?php

    $url = "http://localhost/web_services.php";
    $post_data = array ("username" => "bob","key" => "12345");

    $ch = curl_init();   //1.初始化，创建一个新cURL资源

    curl_setopt($ch, CURLOPT_URL, $url);             //2.设置URL和相应的选项
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // post数据
    curl_setopt($ch, CURLOPT_POST, 1);      //使用post请求
    // post的变量
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    $output = curl_exec($ch);    //3.抓取URL并把它传递给浏览器
    curl_close($ch);            //4.关闭cURL资源，并且释放系统资源


    print_r($output);    //打印获得的数据