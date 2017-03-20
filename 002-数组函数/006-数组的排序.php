<?php

function myfunction1($a,$b) {
    if ($a==$b) return 0;
    return ($a<$b)?-1:1;
}
//1、通过元素值对数组排序
$arr = ['a'=>1,'b'=>2,'c'=>3,'d'=>0];
sort($arr);                   //由小到大的顺序排序（第二个参数为按什么方式排序）忽略键名的数组排序
//array(4) { [0]=> int(0) [1]=> int(1) [2]=> int(2) [3]=> int(3) }
rsort($arr);                  //由大到小的顺序排序（第二个参数为按什么方式排序）忽略键名的数组排序
//array(4) { [0]=> int(3) [1]=> int(2) [2]=> int(1) [3]=> int(0) }
$arr1 = usort($arr,"myfunction1");   //使用用户自定义的比较函数对数组中的值进行排序
//usort($a, array("TestObj", "cmp_obj")); //array('类名','类成员方法')
asort($arr);                  //由小到大的顺序排序（第二个参数为按什么方式排序）保留键名的数组排序
arsort($arr);                 //由大到小的顺序排序（第二个参数为按什么方式排序）保留键名的数组排序
uasort($arr,"myfunction1");   //使用用户自定义的比较函数对数组中的值进行排序,保留键名的数组排序

//2、通过键名对数组排序
$arr = ['a'=>1,'c'=>3,'d'=>0,'b'=>2];
ksort($arr);  //按照键名正序排序
//Array ( [a] => 1 [b] => 2 [c] => 3 [d] => 0 )
krsort($arr);  //按照键名逆序排序
//Array ( [d] => 0 [c] => 3 [b] => 2 [a] => 1 )
function myfunction2($a,$b) {
    if ($a==$b) return 0;
    return ($a<$b)?-1:1;
}
uksort($arr,"myfunction2");
//Array ( [a] => 1 [b] => 2 [c] => 3 [d] => 0 )

//3、自然排序法排序(不建议常用)
$arr = ['a'=>1,'c'=>2,'C'=>2,'B'=>2,'b'=>2,'d'=>2,'D'=>2];
natsort($arr);  //自然排序（忽略键名）
//Array ( [a] => 1 [d] => 2 [D] => 2 [b] => 2 [B] => 2 [c] => 2 [C] => 2 )
natcasesort($arr);  //自然排序（忽略大小写，忽略键名）
//Array ( [a] => 1 [c] => 2 [C] => 2 [B] => 2 [b] => 2 [d] => 2 [D] => 2 )
