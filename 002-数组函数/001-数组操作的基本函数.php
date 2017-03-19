<?php
//1.数组的键名和值 key   values
$arr = [
    'key'       => Null,
    'apple'     =>'apple',
    'chicken'   =>2,
    'cake'      =>3,
    'time'      => [
        'day'=>'2017-03-19',
        'month'=>'2017-03'
    ]
];
$arr1  = array_values($arr);            //获得数组的值 Array ( [0] => 1 [1] => 2 [2] => 3 [3] => Array ( [day] => 2017-03-19 [month] => 2017-03 ) )
$arr2  = array_keys($arr);              //获得数组的键名 Array ( [0] => apple [1] => chicken [2] => cake [3] => time )
@$arr3 = array_flip($arr);              //数组中的值与键名互换（如果有重复前面的会被后面的覆盖） ,Array ( [1] => apple [2] => chicken [3] => cake ),不支持多维数组Can only flip STRING and INTEGER values!

$arr4  = in_array("apple",$arr);        //在数组值中检索apple,返回true,false
$arr5  = array_search("apple",$arr);    //在数组中检索apple ，如果存在返回键名 ,否则返回false,可传字符串，数组

$arr6  = array_key_exists("key",$arr);     //检索给定的键名是否存在数组中 ,true
$arr7  = isset($arr['key']);               //检索给定的键名是否存在数组中 ,false
/*
 1.对于数组值的判断不同，对于值为null或''或false,isset返回false，array_key_exists返回true；
 2. 执行效率不同，isset是内建运算符，array_key_exists是php内置函数，isset要快一些。请参考：PHP 函数实现原理及性能分析
 3.当用isset访问一个不存在索引数组值时，不会引起一个E_NOTICE的php错误消息；
 4.array_key_exists 会调用get_defined_vars判断数组变量是否存在，isset不用；
 */


//2、数组的内部指针
$arr = [1=>'first',2=>'second',3=>'third',4=>'forth'];

var_dump(current($arr));       //返回数组中的当前指针单元
var_dump(pos($arr));           //返回数组中的当前单元  position
var_dump(key($arr));           //返回数组中当前单元的键名
var_dump(prev($arr));          //将数组中的内部指针倒回一位
var_dump(next($arr));          //将数组中的内部指针向前移动一位
var_dump(end($arr));           //将数组中的内部指针指向最后一个单元
var_dump(reset($arr));         //将数组中的内部指针指向第一个单元
$new_arr = each($arr);         //将返回数组当前元素的一个键名/值的构造数组，并使数组指针向前移动一位
//array(4) { [1]=> string(5) "first" ["value"]=> string(5) "first" [0]=> int(1) ["key"]=> int(1) }
list($key,$value)=each($arr);  //获得数组当前元素的键名和值,key 2 ,value :second

//3、数组和变量之间的转换
echo '<br/>';
$arr = ['name'=>'demon','mobile'=>'13800138000'];
extract($arr);                 //用于把数组中的元素转换成变量导入到当前文件中，键名当作变量名，值作为变量值。
echo '名字:'.$name.'-手机号:'.$mobile;
var_dump(compact('name','mobile'));       //用给定的变量名创建一个数组
