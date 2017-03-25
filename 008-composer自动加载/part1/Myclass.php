<?php
#保存在MyClass.php

class MyClass
{

    public function getNamespace()
    {
        return get_class($this);
    }
}