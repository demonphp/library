<?php
/*
$fn = $_GET['fn'];	//$fn = 'callback';
$str = 'Ajax跨域请求';  //把最终返回结果赋值给$str
echo $fn."('$str')"; //callback('Hello Ajax');
*/
$fn = $_GET['fn'];
$data = [['id'=>1,'title'=>'什么是jsonp'],['id'=>2,'title'=>'jsonp示例']];


$str = json_encode($data);
echo $fn."($str)";