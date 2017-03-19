<?php
//1.数组的键名和值 key   values
$arr = [
    'key' => Null,
    'apple'=>'apple',
    'chicken'=>2,
    'cake'=>3,
    'time'=>[
        'day'=>'2017-03-19',
        'month'=>'2017-03'
    ]
];
$arr1 = array_values($arr);            //获得数组的值 Array ( [0] => 1 [1] => 2 [2] => 3 [3] => Array ( [day] => 2017-03-19 [month] => 2017-03 ) )
$arr2 = array_keys($arr);              //获得数组的键名 Array ( [0] => apple [1] => chicken [2] => cake [3] => time )
@$arr3 = array_flip($arr);              //数组中的值与键名互换（如果有重复前面的会被后面的覆盖） ,Array ( [1] => apple [2] => chicken [3] => cake ),不支持多维数组Can only flip STRING and INTEGER values!

$arr4 = in_array("apple",$arr);        //在数组值中检索apple,返回true,false
$arr5 = array_search("apple",$arr);    //在数组中检索apple ，如果存在返回键名 ,否则返回false,可传字符串，数组

$arr6 = array_key_exists("key",$arr);     //检索给定的键名是否存在数组中 ,true
$arr7 = isset($arr['key']);               //检索给定的键名是否存在数组中 ,false
/*
 1.对于数组值的判断不同，对于值为null或''或false,isset返回false，array_key_exists返回true；
 2. 执行效率不同，isset是内建运算符，array_key_exists是php内置函数，isset要快一些。请参考：PHP 函数实现原理及性能分析
 3.当用isset访问一个不存在索引数组值时，不会引起一个E_NOTICE的php错误消息；
 4.array_key_exists 会调用get_defined_vars判断数组变量是否存在，isset不用；
 */
