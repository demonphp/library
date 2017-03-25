<?php

function __autoload($name)
{
    //2.在当前目录下查找该类的文件
    $file = realpath(__DIR__).'/'.$name.'.php';
    //3.如果该文件存在,引入该文件
    if(file_exists($file))
    {
        require_once($file);
        //4.如果已经加载的类中,类名存在,返回真
        if(class_exists($name,false))       //class_exists() 默认将会尝试调用 __autoload，如果不想让 class_exists() 调用 __autoload，可以将 autoload 参数设为 FALSE。
        {
            return true;
        }
        return false;
    }
    return false;
}

//1.new类,new不出来，调用__autoload魔术方法
$obj = new MyClass();

echo $obj->getNamespace();    //5.调用myclass类中的getnamespace方法