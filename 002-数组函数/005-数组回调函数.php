<?php

function myfunction1($value,$key,$p)
{
    echo "$key $p $value<br>";
}
$arr = array("a"=>"red","b"=>"green","c"=>"blue");

array_walk($arr,'myfunction1','words');    //使用用户函数对数组中的每个成员进行处理（第三个参数传递给回调函数myfunction）


$arr1 = [1,2,3,4,5];
function myfunction2($v)
{
    echo $v*$v.'<br/>';
}
array_map("myfunction2",$arr1);      //可以处理多个数组（当使用两个或更多数组时，他们的长度应该相同）


$arr1 = [1,2,3,4,5];
$arr2 = [1,2,3,4,6];
function myfunction3($v1,$v2)
{
    if ($v1===$v2)
    {
        echo "same<br/>";
    }else {
        echo "different<br/>";
    }
}
array_map("myfunction3",$arr1,$arr2);        //可以处理多个数组（当使用两个或更多数组时，他们的长度应该相同）

function myfunction4($var)
{
    // returns whether the input integer is odd
    return ($var & 1);
}

$arr = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);

print_r(array_filter($arr, "myfunction4"));  //回调函数,使用回调函数过滤数组中的每个元素，如果回调函数为TRUE，数组的当前元素会被包含在返回的结果数组中，数组的键名保留不变
//Array ( [a] => 1 [c] => 3 [e] => 5 )


function myfunction5($v1,$v2)
{
    return $v1+$v2;
}
$a=array(10,15,20);
print_r(array_reduce($a,"myfunction5",5));    //转化为单值函数（*为数组的第一个值）

