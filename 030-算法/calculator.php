<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
</head>
<body>
<h1>计算结果 </h1>
<?php
    $exp = $_GET['exp'];
    //echo $exp.'结果是=';
    //$exp='3+2*6-2';
    //定义一个数栈和一个符号栈
    $numsStack = new MyStack();
    $operStack = new MyStack();
    $keepNum = ''; //专门用于拼接多位数的字符串
    $index = 0; //$index就是一个扫描的标记
    while(true){
        //依次取出字符
        $ch = substr($exp, $index, 1); //从$exp里的$index位置取出1个字符
        //判断$ch是不是一个运算符号
        if($operStack->isOper($ch) == true){
            //说明是运算符
            /*
            3.如果发现是运算符
            3.1如果符号栈为空，就直接入符号栈
            3.2如果符号栈不为空，就要判读。如果当前运算符的优先级小于等于符号栈顶的这个运算符的优先级，就计算，并把计算结果入数栈，然后把当前符号入栈（然后把当前符号入栈，此处会有问题，碰到复杂运算的时候，先考虑简单的，后面再优化，先死后活）
            3.3如果符号栈不为空，就要判读。如果当前运算符的优先级大于符号栈顶的这个运算符的优先级，就入栈
             */
            //把思路转成代码
            if($operStack->isEmpty()){
                $operStack->push($ch);
            }else{
                //需要一个函数，来获取运算符的优先级
                //定义 *和/为1 +和-为0
                //$chPRI=$operStack->PRI($ch); //这是当前的
                //$stackPRI=$operStack->PRI($operStack->getTop()); //这是栈里的
                //只要你准备入符号栈的运算优先级小于等于当前栈栈顶的运算优先级，就一直计算
                //直到这个条件不满足，我才把当前的符号入符号栈
                //并且只要符号栈不为空
                //!$operStack->isEmpty() && 这个尤为重要，少了此句话，就死循环了，有可能不停的判断
                while(!$operStack->isEmpty() && $operStack->PRI($ch) <= $operStack->PRI($operStack->getTop())){
                    //从数栈里依次出栈两个数
                    $num1 = $numsStack->pop();
                    $num2 = $numsStack->pop();
                    //再从符号栈里取出一个运算符
                    $oper = $operStack->pop();
                    //这里还需要一个计算的函数
                    $res = $operStack->getResult($num1, $num2, $oper);
                    //然后还要把$res入数栈
                    $numsStack->push($res);
                }
                //经过上面的while判断后，再把当前这个符号再入符号栈。
                $operStack->push($ch);
            }
        }else{
            //先不要立马就入栈
            $keepNum .= $ch; //拼接
            //要判断一下$ch字符的下一个字符是数字还是符号
            //如果已经是末尾了，就不用再判断了
            //先判断是否已经到了字符串最后，是的话就直接入栈
            if($index == strlen($exp) - 1){ //如果已经到了末尾，直接入栈
                $numsStack->push($keepNum); //要入拼接好的，而不是$ch
            }else{
                //要判断一下$ch字符的下一个字符是数字还是符号
                if($operStack->isOper(substr($exp, $index + 1, 1))){ //取出下一位的
                    $numsStack->push($keepNum);
                    $keepNum = ''; //清空
                }

            }
        }
        $index++; //让$index指向下一个字符
        //判断是否已经扫描完毕
        if($index == strlen($exp)){
            break;
        }
        //当扫描完毕后，就break
    }
    /*
     4.当扫描完毕后，就依次弹出数栈和符号栈的数据，并计算，最终留在数栈的值，就是运算结果。
    */
    //只要符号栈不空，就一直计算
    while(!$operStack->isEmpty()){
        $num1 = $numsStack->pop();
        $num2 = $numsStack->pop();
        $oper = $operStack->pop();
        $res = $operStack->getResult($num1, $num2, $oper);
        $numsStack->push($res);
    }
    //当退出while后，在数栈中一定有一个数，这个数就是最后结果
    echo $exp . '=' . $numsStack->getTop();

    //这是我们自定义的栈
    class MyStack
    {
        private $top = -1; //默认是-1，表示该栈是空的
        private $maxSize = 10; //$maxSize表示栈最大容量
        private $stack = [];

        //增加一个函数[提示，在我们开发中，根据需要可以灵活的增加你需要的函数，不要想着一步到位]
        //计算的函数
        public function getResult($num1, $num2, $oper)
        {
            $res = 0;
            switch($oper){
                case '+':
                    $res = $num1 + $num2;
                    break;
                case '-':
                    //$res=$num1-$num2;要注意减的顺序，这样不对
                    $res = $num2 - $num1; //注意顺序
                    break;
                case '*':
                    $res = $num1 * $num2;
                    break;
                case '/':
                    $res = $num2 / $num1; //注意顺序
                    break;

            }
            return $res;
        }

        //返回栈顶的字符，只取，但是不出栈
        public function getTop()
        {
            return $this->stack[ $this->top ];
        }

        //判断优先级的函数
        //定义 *和/为1 +和-为0。先死后活，先考虑简单的，至于带括号的，在后面再改进。
        public function PRI($ch)
        {
            if($ch == '*' || $ch == '/'){
                return 1;
            }else if($ch == '+' || $ch == '-'){
                return 0;
            }
        }

        //判断栈是否为空
        public function isEmpty()
        {
            if($this->top == -1){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        //判断是不是一个运算符
        public function isOper($ch)
        {
            if($ch == '-' || $ch == '+' || $ch == '*' || $ch == '/'){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        //入栈的操作
        public function push($val)
        {
            //先判断栈是否已经满了
            if($this->top == $this->maxSize - 1){ //5-1=4 0 1 2 3 4
                echo '<br/>栈满，不能添加';
                return;
            }
            $this->top++; //先加再放
            $this->stack[ $this->top ] = $val; //就入栈了
        }

        //出栈的操作，就是把栈顶的值取出
        public function pop()
        {
            //判断是否栈空
            if($this->top == -1){
                echo '<br/>栈空';
                return;
            }
            //把栈顶的值，取出
            $topVal = $this->stack[ $this->top ];
            $this->top--;
            return $topVal;
        }

        //显示栈的所有数据的方法
        public function showStack()
        {
            if($this->top == -1){
                echo '<br/>栈空';
                return;
            }
            echo '<br/>当前栈的情况是...';
            for($i = $this->top; $i > -1; $i--){ //反着显示
                echo '<br/>stack[' . $i . ']=' . $this->stack[ $i ]; //从栈顶开始显示
            }
        }
    }

?>
</body>
</html>