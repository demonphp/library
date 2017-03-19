<?php
//trim函数、ltrim函数、rtrim函数、str_pad函数、chunk_split函数
    $str = '12345678';
    echo chunk_split($str,3,',');
    echo "<br>";
    $text   = "\t\tThese are a few words :) ...  ";
    echo trim($text);
    echo "<br>";
    echo ltrim($text,'\t'),'<br>';
    echo rtrim($text,'\r'),'<br>';
    echo str_pad('apple', 6)."is good.";