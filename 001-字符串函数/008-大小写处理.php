<?php
//strtolower函数、strtoupper函数、ucfirst函数、ucwords函数
    $url="http://WWWW.BAIDU.COM";
    echo strtolower($url),'<br>';
    $str="hello world";
    echo strtoupper($str),'<br>';
    $str="php is the most popular language ";
    echo ucfirst($str),'<br>';
    echo ucwords($str);