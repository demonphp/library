<?php
//str_split函数、split函数、explode函数和implode函数
header('content-type:text/html;charset=utf-8');
$str = "Hello Friend";

$arr1 = str_split($str);
print_r($arr1);

$arr2 = str_split($str, 3);
print_r($arr2);

$str = 'abc,中国,美国,日本';
// explode,是根据指定的分割符,把字符串拆成数组.
$arr = explode(',',$str);
print_r($arr);
// implode,是根据指定的连接符,把数组再拼接成字符串
$arr = explode(',',$str);
echo implode('~',$arr),'<br />';
// 你可以只传一个数组做参数,不指定连接符,
// 这样,将把数组单元直接拼接起来
echo implode($arr);