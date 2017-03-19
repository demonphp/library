<?php
//strcmp函数、strcasecmp函数、strspn函数、strcspn函数
    $pwd="userpwd";
    $pwd2="Userpwd";
    //区分大小写
    if (strcmp($pwd, $pwd2) !=0) {
        echo "password do not match";
    } else{
        echo "password match";
    }

    $email1="www.baidu.com";
    $email2="WWW.BAIDU.COM";
    //不区分大小写
    if (!strcasecmp($email1, $email2)) {
        echo "ok",'<br>';
    }
    //求两个字符串相同的部分
    $password="1233345";
    if (strspn($password,"1234567890")==strlen($password)) {
        echo "the password connot consist solely of numbers";
    }
    //
    $password="a12345";
    if (strcspn($password, "1234567890")==0) {
        echo "the password connot consist solely of numbers";
    }