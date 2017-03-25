<?php
#在跟MyClass目录同级的目录下，新建一个文件，内容如下
function loader($name)
{
    $class_path = str_replace('\\',DIRECTORY_SEPARATOR,$name);   //把表示命名空间的分割符号，转换成表示目录结构的斜线

    $file = realpath(__DIR__).'/'.$class_path.'.php';
    if(file_exists($file))
    {
        require_once($file);    //引入文件
        if(class_exists($name,false))    //带有命名空间的类名
        {
            return true;
        }
        return false;
    }
    return false;
}

spl_autoload_register('loader');    //注册函数
//1.正式调用方法
//$obj = new MyClass\MyClass();
//echo $obj->getNamespace();               //输出： MyClass\MyClass;

//echo '<pre/>';
//2.使用::调用方法
echo MyClass\MyClass::getNamespace();    //输出： MyClass\MyClass;