<?php
//strlen函数和mb_strlen函数，后者需要开启mbstring扩展
    header('content-type:text/html;charset=utf-8');
    $str = 'abcdef';
    echo strlen($str); // 6
    echo "<br/>";
    $str = ' ab cd ';
    echo mb_strlen($str); // 7
    echo "<br/>";
    //strlen 是计算字符串"字节"长度
    //mb_strlen,是根据编码,计算字符串的"字符"个数.

    $str='中华人民共和国';
    echo "字节长度是".strlen($str);//在 UTF-8编码下，一个汉字占3个字节 在gbk中一个汉字占2个字节
    echo "<br/>";
    echo "字符长度是".mb_strlen($str,'utf-8');