<?php
    //1.初始化，创建一个新cURL资源
    $ch = curl_init();
    //2.设置URL和相应的选项
    curl_setopt($ch, CURLOPT_URL, "http://www.baidu.com/");
    curl_setopt($ch, CURLOPT_HEADER, 0);        //启用时会将头文件的信息作为数据流输出。
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  //设置后则不再进行输出,不在浏览器进行输出，转为文件流的形式
    //3.抓取URL并把它传递给浏览器
    $data = curl_exec($ch);
    //4.关闭cURL资源，并且释放系统资源
    curl_close($ch);

    file_put_contents('./curl.html',$data);


