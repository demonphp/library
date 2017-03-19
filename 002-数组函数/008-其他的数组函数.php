<?php

range(0,12);                //创建一个包含指定范围单元的数组
array_unique($arr);         //移除数组中重复的值，新的数组中会保留原始的键名
array_reverse($arr,TRUE);   //返回一个单元顺序与原数组相反的数组，如果第二个参数为TRUE保留原来的键名
array_rand($arr,2);         //从数组中随机取出一个或 多个元素
shuffle($arr);              //将数组的顺序打乱
array_merge($arr1,$arr2);   //合并数组