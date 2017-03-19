<?php
$arr = [
    'one'   =>1,
    'two'   =>2,
    'three' =>3,
    'four'  =>4,
    'five'  =>5,
];
//1、数组的分段
$arr1 = array_slice($arr,0,3);               //可以将数组中的一段取出，此函数忽略键名
var_dump($arr1);                             //array(3) { ["one"]=> int(1) ["two"]=> int(2) ["three"]=> int(3) }

$arr2 = array_splice($arr,0,3,array("one")); //可以将数组中的一段取出，与上个函数不同在于返回的序列从原数组中删除
var_dump($arr2);                             //array(3) { ["one"]=> int(1) ["two"]=> int(2) ["three"]=> int(3) }
var_dump($arr);                              //array(3) { [0]=> string(3) "one" ["four"]=> int(4) ["five"]=> int(5) }

//2、分割多个数组
$arr3 = array_chunk($arr,3,TRUE);                       //可以将一个数组分割成多个，TRUE为保留原数组的键名
var_dump($arr3);
//array(2) { [0]=> array(3) { ["one"]=> int(1) ["two"]=> int(2) ["three"]=> int(3) } [1]=> array(2) { ["four"]=> int(4) ["five"]=> int(5) } }

//3、数组的填充
$arr4 = array_pad($arr,10,'x');                         //将一个数组填补到制定长度,即数组长度
var_dump($arr4);
//array(10) { ["one"]=> int(1) ["two"]=> int(2) ["three"]=> int(3) ["four"]=> int(4) ["five"]=> int(5) [0]=> string(1) "x" [1]=> string(1) "x" [2]=> string(1) "x" [3]=> string(1) "x" [4]=> string(1) "x" }
