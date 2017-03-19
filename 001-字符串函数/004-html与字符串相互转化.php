<?php
//htmlspecialchars函数、strip_tags函数、get_html_translation_table函数和addcslashes函数和htmlentities函数
    $str = "hello ', world";
    echo $str,'<br />';
    echo $str= addslashes($str),'<br />';
    echo stripslashes($str),'<br />';
    $str = '<ab>';
    echo $str,'<br />';
    echo htmlspecialchars($str);
    echo "</br>";
    $str="Email <a href='admin@qq.com'>example@qq.com</a>";
    echo strip_tags($str);