<?php
namespace Pay\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$this->display();
		//echo($form);
	}
	
	public function payto(){
		$data['subject'] = $_POST['subject'];
		$data['out_trade_no'] = $_POST['out_trade_no'];
		$data['total_fee'] = $_POST['total_fee'];
		$res = D('Common/Pay')->alipay($data);
		$this->ajaxReturn($res);
	}

}