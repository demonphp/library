<?php
	$appid=5288971;
	$appsecret= 'r5e2t85tyu142u665698fzu';

	$array=[
		'appid'=>5288971,
		'menu'=>'客户服务列表',
		'lat'=>21.223,
		'lng'=>131.334
    ];

    // 1. 对加密数组进行字典排序
	foreach ($array as $key=>$value){
	 $arr[$key] = $key; 
	 }
	 sort($arr); //字典排序的作用就是防止因为参数顺序不一致而导致下面拼接加密不同
	 
	 // 2. 将Key和Value拼接
	 
	 $str = "";
	foreach ($arr as $k => $v) {
	 $str = $str.$arr[$k].$array[$v];
	}

	//3. 通过sha1加密并转化为大写
	//4. 大写获得签名
	$restr=$str.$appsecret;
	$sign = strtoupper(sha1($restr));

	// echo $sign;

	$array['sign']=$sign;

	// echo json_encode($array);


/*
$model=Model::find()->where("appid=:appid")->params([":appid"=>$serverArray['appid']])->one();
 if($model){
   $serverSecret=$model->appsecret;
}
*/

$serverSecret = 'r5e2t85tyu142u665698fzu';
$clientSign=$array['sign'];

$serverArray= $array;
unset($serverArray['sign']);

#生成服务端str
$serverstr = "";
foreach ($serverArray as $k => $v) {
 $serverstr = $str.$k.$v;
}

echo $serverstr.'<br/>';
$reserverstr=$str.$serverSecret;
$reserverSign = strtoupper(sha1($reserverstr));

if($clientSign!=$reserverSign){
    echo '密钥不正确';
}else{
	echo '密钥正确';
}