<?php
/*
 *   数组的比较主要是比较数组长度，数组元素的值
 *   ==和===
 *   ==：要求数组长度一致，数组元素的值相等，下标也要相等
 *   ===：数组长度一致，值和类型都完全一致，出现的顺序必须也相同
 */

$arr1 = [1,2,3];
$arr2 = [3,2,1];
$arr3 = [2=>3,1=>2,0=>1];
$arr4 = [1,2,3];


//==比较
var_dump($arr1 == $arr2);   //false
var_dump($arr1 == $arr3);   //true
var_dump($arr1 == $arr4);   //true

//===比较
var_dump($arr1 === $arr2);  //false
var_dump($arr2 === $arr3);  //false