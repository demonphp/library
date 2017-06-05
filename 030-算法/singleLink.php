<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
</head>
<body>
<h1>单向链表完成英雄排行管理</h1>
<hr/>
<a href="#">查询英雄</a>
<a href="#">添加英雄</a>
<a href="#">删除英雄</a>
<a href="#">修改英雄</a>

<?php

    //定义英雄类
    class Hero
    {
        public $no;//排名
        public $name;//真实名字
        public $nickname;//外号
        public $next = null;//$next是一个引用，指向另外一个Hero的对象实例。

        //构造函数
        public function __construct($no = '', $name = '', $nickname = '')
        {
            //赋值
            $this->no = $no;
            $this->name = $name;
            $this->nickname = $nickname;
        }
    }

    //创建一个head头，该head只是一个头，不放入数据
    $head = new Hero();
    //写一个函数，专门用于添加英雄
    function addHero($head, $hero)
    {
        //1.直接在链表最后加
        //要找到链表的最后，千万不能动$head;
        $cur = $head;
        //2.按照英雄的排行加入（这里我希望能够保证链表的顺序）
        //思路：一定要先谈思路，再写代码
        $flag = false; //表示没有重复的编号
        while($cur->next != null){
            if($cur->next->no > $hero->no){
                //找到位置了
                break;
            }else if($cur->next->no == $hero->no){
                $flag = true; //如果进入此处，就说明有重复的了，置为true
                echo '<br/>不能抢位置，' . $hero->no . '位置已经有人了';
            }
            //继续
            $cur = $cur->next;
        }
        //当退出while循环的时候，位置找到
        //加入
        //让hero加入
        if($flag == false){ //只有当$flag为false的时候，说明没有遇到重复的，才会执行插入。如果不加$flag标志位，虽然上面的else if判断了，遇到重复的，但是仍然会插入。
            $hero->next = $cur->next;
            $cur->next = $hero;
        }
    }

    //单链表的遍历，必须要从head头节点开始找
    //是从head开始遍历的，$head头的值千万不能变，变化后就不能遍历我们的单链表了
    function showHeros($head)
    {
        //遍历[必须要知道什么时候，到了链表的最后]
        //这里为了不去改变$head的指向，我们可以使用一个临时的变量
        $cur = $head;
        while($cur->next != null){
            //第一个节点为头结点，所以用$cur->next指向下一个节点，头结点里什么都没有是空的
            echo '<br/>英雄的编号是' . $cur->next->no . '名字' . $cur->next->name . '外号=' . $cur->next->nickname;
            //如果只写到这里，就会是死循环了
            //所有要让$cul移动
            $cur = $cur->next;
        }
    }

    //从链表中删除某个英雄
    function delHero($head, $herono)
    {
        //首先要找到这个英雄在哪里
        $cur = $head; //让$cur指向$head;
        $flag = false; //标志位，假设没有找到
        while($cur->next != null){
            if($cur->next->no == $herono){
                $flag = true; //进入if语句就说明找到了，置为true
                //找到 $cur的下一个节点就是应该被删除的节点。
                break;
            }
            $cur = $cur->next;
        }
        if($flag){ //如果flag为真，就删除
            //删除
            $cur->next = $cur->next->next;
        }else{
            echo '<br/>没有你要删除的英雄的编号' . $herono;
        }
    }

    //修改英雄
    function updateHero($head, $hero)
    {
        //还是先找到这个英雄
        $cur = $head; //$cur就是跑龙套的
        while($cur->next != null){
            if($cur->next->no == $hero->no){
                break;
            }
            //继续下走
            $cur = $cur->next;
        }
        //这次不使用flag标志位了
        //当退出while循环后，如果$cur->next==null说明cur到队尾了，也没有找到
        if($cur->next == null){
            echo '<br/>你需要修改的' . $hero->no . '不存在';
        }else{
            //编号不能修改，只能修改名字和昵称
            $cur->next->name = $hero->name;
            $cur->next->nickname = $hero->nickname;
        }
    }

    //添加
    $hero = new Hero(1, '宋江', '及时雨');
    addHero($head, $hero);
    $hero = new Hero(2, '卢俊义', '玉麒麟');
    addHero($head, $hero);
    $hero = new Hero(6, '林冲', '豹子头');
    addHero($head, $hero);
    $hero = new Hero(3, '吴用', '智多星');
    addHero($head, $hero);
    $hero = new Hero(1, '宋江', '及时雨');
    addHero($head, $hero);
    $hero = new Hero(2, '卢俊义', '玉麒麟');
    addHero($head, $hero);
    //在输出的时候，林冲就排在了吴用的前面了，而林冲是6号，应当排在吴用的后面，这就是直接在链表最后添加的弊端。
    echo '<br/>***********当前的英雄排行情况是**************';
    showHeros($head);
    echo '<br/>***********删除后的英雄排行情况是**************';
    //delHero($head,1);
    delHero($head, 21); //删除一个不存在的
    showHeros($head);
    echo '<br/>***********修改后的英雄排行情况是**************';
    $hero = new Hero(1, '胡汉三', '右白虎');
    updateHero($head, $hero);
    showHeros($head);
?>
</body>
</html>