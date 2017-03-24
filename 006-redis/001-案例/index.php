<?php
    require_once 'common/base.php';

    echo "当前登录用户是：".$_SESSION['username'];
    //取出用户列表，实现分页显示
    //(1)计算总的记录数 ,
    $count = $redis->llen($conf['main_user_count']);
    //(2)定义每页显示的记录数
    $perpage = 4;
    //(3)计算总的页数
    $pagecount = ceil($count/$perpage);
    //(4)定义当前页面
    $page = isset($_GET['page'])?(max(1,min($pagecount,$_GET['page']))):1;
    //(5) 取出当前页面的数据
    //思路：取出链表里面的id,根据id拼接哈希，取出哈希内容。 limit ($offset ,$perpage)
     /*
    $redis->lrange('userid',0,1)   //第一页数据     ($page-1)*$perpage=0         ($page-1)*$perpage+$perpage-1 =1
    $redis->lrange('userid',2,3)   //第二页数据    ($page-1)*$perpage=2       ($page-1)*$perpage+$perpage-1=3
    $redis->lrange('userid',4,4)   //第三页数据    ($page-1)*$perpage=4
    如果每页显示5个
    $redis->lrange('userid',0,4)      ($page-1)*$perpage=0    5
    $redis->lrange('userid',5,9)      5,9
    $redis->lrange('userid',10,14)
    */
    $offset = ($page-1)*$perpage;
    $N= ($page-1)*$perpage+$perpage-1;
    $ids = $redis->lrange($conf['main_user_count'],$offset,$N);//返回值是一个一维数组
    //取出当前页面的数据
    $data=array();
    foreach($ids as $v){
        $data[]= $redis->hgetall($conf['main_user'].$v);//返回是一行数据，也就是一个一维数组
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>列表页</title>
</head>
    <body>
    <h1>用户列表</h1>
    <table width="600" border="1">
            <tr>
                    <td>编号</td>
                    <td>姓名</td>
                    <td>年龄</td>
                    <td>操作</td>
            </tr>
            <?php foreach($data as $v){?>

             <tr>
                    <td><?php echo $v['id']?></td>
                    <td><?php echo $v['username']?></td>
                    <td><?php echo $v['age']?></td>
                    <td><a href="del.php?id=<?php echo $v['id']?>">删除</a>|<a href="guan.php?id=<?php echo $v['id']?>">添加关注</a></td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="3">
                        <a href="?page=<?php echo max(1,$page-1)?>">上一页</a><a href="?page=<?php echo min($page+1,$pagecount)?>">下一页</a>
                </td>
            </tr>
    </table>
    <h1>显示登录用户的关注</h1>
    <?php 
        $ownid =$_SESSION['user_id'];//取出登录用户的id
//        $ids = $redis->smembers($conf['main_user_friend'].$ownid); //返回的是一维数组,无序的
        $ids = $redis->zrange($conf['main_user_friend'].$ownid,0,-1); //返回的是一维数组,有序的
        $data1=array();
        foreach($ids as $v){
            $data1[]= $redis->hgetall($conf['main_user'].$v);//返回是一行数据，也就是一个一维数组
            //var_dump($data1);
        }
        foreach($data1 as $v){
            echo $v['username'].'<br/>';
        }
    ?>
    </body>
</html>