<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
</head>
<body>
<h1>双向链表完成英雄排行管理</h1>
<hr/>
<a href="#">查询英雄</a>
<a href="#">添加英雄</a>
<a href="#">删除英雄</a>
<a href="#">修改英雄</a>

<?php

    //使用PHP面向对象的方式来完成
    class Hero
    {
        public $pre = null; //表示指向前一个节点的引用
        public $no;
        public $name;
        public $nickname;
        public $next = null; //表示指向后一个节点的引用

        public function __construct($no = '', $name = '', $nickname = '')
        {
            $this->no = $no;
            $this->name = $name;
            $this->nickname = $nickname;
        }

        //添加hero，这里我们会构建一个双向链表
        //这里使用了静态函数
        public static function addHero($head, $hero)
        {
            //$head头节点不能动
            //$cur为辅助节点，让$cur来穿针引线
            $cur = $head;
            //isExist 假设英雄不存在
            $isExist = FALSE; //这是一个标志位
            //首先看看目前的这个链表是不是空的
            //当还有英雄的时候，$cur指向的$head节点的next属性必然为null，因为现在只有head节点，还没有添加英雄
            //如果是空链表就直接加入
            //怎样把空链表和普通链表并和在一起呢？
            if($cur->next == null){ //如果是，就说明是空链表，添加第一个英雄
                $cur->next = $hero;
                //这样就首尾相连了
                $hero->pre = $cur;
            }else{ //当不是空节点的时候
                //如果不是空节点，按照排名来添加
                //首先找到添加的位置
                while($cur->next != null){ //只要$cur->next不等于null，就说明没有到队尾
                    if($cur->next->no > $hero->no){ //说明位置找到了，则说明$hero要加在$cur的后面
                        break;

                    }else if($cur->next->no == $hero->no){
                        $isExist = TRUE;
                        echo '<br/>不能添加相同的编号';
                    }
                    //继续下一个
                    $cur = $cur->next;
                }
                //退出该while循环时候，我们只需要把$hero添加到$cur后面即可，（队尾）
                //说明还没有这个排名，可以添加，并可以和上面的空链表判断合并
                if(!$isExist){ //如果不存在就添加，因为在上面break跳出的时候，就说明找到了，跳出的时候$isExist为假，则!$isExist为真
                    //添加，有点麻烦
                    $hero->next = $cur->next;
                    $hero->pre = $cur;
                    $cur->next->pre = $hero;
                    $cur->next = $hero;
                }
            }
        }

        //遍历显示双向链表，显示所有英雄的函数
        public static function showHero($head)
        {
            //上来线做一个辅助指针，穿针引线
            $cur = $head->next; //头本来就是空的，这样就输出打印的时候，不输出头了
            //$cur=$head; 如果是这样，每次输出的时候会输出：编号= 名字= 外号=  把头也输出了
            while($cur->next != null){ //为空就说明到队尾了
                echo '<br/>编号=' . $cur->no . '名字=' . $cur->name . '外号=' . $cur->nickname;
                //继续下移一步
                $cur = $cur->next;
            }
            //当退出while的时候，$cur就指向了最后的那个节点了
            //要是不输出，就会少一个人，少队尾的那个人
            echo '<br/>编号=' . $cur->no . '名字=' . $cur->name . '外号=' . $cur->nickname;
        }
    }

    //创建一个头节点
    $head = new Hero();
    //创建一个英雄
    $hero = new Hero(1, '宋江', '及时雨');
    //静态方法的调用
    Hero::addHero($head, $hero);
    $hero = new Hero(2, '卢俊义', '玉麒麟');
    Hero::addHero($head, $hero);
    $hero = new Hero(6, '林冲', '豹子头');
    Hero::addHero($head, $hero);
    $hero = new Hero(3, '吴用', '智多星');
    Hero::addHero($head, $hero);
    $hero = new Hero(56, '孙二娘', '母夜叉');
    Hero::addHero($head, $hero);
    echo '<br/>英雄排行榜.....';
    //显示
    Hero::showHero($head);
?>
</body>
</html>