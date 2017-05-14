<?php
$conn=mysqli_connect("localhost:3306","root",'root');
if(!$conn){
    echo "connect failed";
    exit;
}
mysqli_select_db($conn,'library');
mysqli_query($conn,"set names utf8");

$price=10;
$user_id=1;
$goods_id=1;
$sku_id=11;
$number=1;

//生成唯一订单
function build_order_no(){
    return date('ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}
//记录日志
function insertLog($event,$type=0){
    global $conn;
    $sql="insert into ih_log(event,type)
    values('$event','$type')";
    mysqli_query($conn,$sql);
}

//模拟下单操作
//库存是否大于0
mysqli_query($conn,"BEGIN");   //开始事务
//库存是否大于0
$sql="select number from ih_store where goods_id='$goods_id' and sku_id='$sku_id'";//解锁 此时ih_store数据中goods_id='$goods_id' and sku_id='$sku_id' 的数据被锁住(注3)，其它事务必须等待此次事务 提交后才能执行
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rs);
if($row['number']>0){//高并发下会导致超卖
    $order_sn=build_order_no();
    //生成订单
    $sql="insert into ih_order(order_sn,user_id,goods_id,sku_id,price)
    values('$order_sn','$user_id','$goods_id','$sku_id','$price')";
    $order_rs=mysqli_query($conn,$sql);

    //库存减少
    $sql="update ih_store set number=number-{$number} where sku_id='$sku_id' and number > 0";
    $store_rs=mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)){
        insertLog('库存减少成功');
        mysqli_query($conn,"COMMIT");//事务提交即解锁
        return '库存减少成功';
    }else{
        insertLog('库存减少失败');
        return '库存减少失败';
    }
}else{
    insertLog('库存不够');
    mysqli_query($conn,"ROLLBACK");
    return '库存不够';
}
