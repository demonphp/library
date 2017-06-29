<?php 
	include_once('DB.class.php');	
	$id = 13300000 + mt_rand(0,30000);
	$sql = "select id,name,brief,address from t_company where id = ".$id;	
	$mem = new Memcached();
	$mem->addServer('127.0.0.1',11211);	

	if(($com = $mem->get($sql)) === false) 
	{
		$db = new DB();	
		$com = $db->db_getOne($sql);

		$mem->add($sql,$comm,false,100);
	}

	print_r($comm);

