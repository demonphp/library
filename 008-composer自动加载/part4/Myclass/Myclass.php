<?php
#保存在MyClass.php
namespace Myclass;

class MyClass
{

    public static function getNamespace()
    {
        //static静态方法不传$this,不建议::调用非静态方法
        return get_class();
    }
}