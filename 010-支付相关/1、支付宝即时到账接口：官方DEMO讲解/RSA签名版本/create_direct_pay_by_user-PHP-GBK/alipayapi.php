<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title>֧������ʱ���˽��׽ӿڽӿ�</title>
</head>
<?php
/* *
 * ���ܣ���ʱ���˽��׽ӿڽ���ҳ
 * �汾��3.4
 * �޸����ڣ�2016-03*08
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

 *************************ע��*****************
 
 *������ڽӿڼ��ɹ������������⣬���԰��������;�������
 *1�������ĵ����ģ�https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.KvddfJ&treeId=62&articleId=103740&docType=1��
 *2���̻��������ģ�https://cshall.alipay.com/enterprise/help_detail.htm?help_id=473888��
 *3��֧�����ģ�https://support.open.alipay.com/alipay/support/index.htm��

 *�����ʹ����չ����,�밴�ĵ�Ҫ��,������ӵ�parameter���鼴�ɡ�
 **********************************************
 */

require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");

/**************************�������**************************/
        //�̻������ţ��̻���վ����ϵͳ��Ψһ�����ţ�����
        $out_trade_no = $_POST['WIDout_trade_no'];

        //�������ƣ�����
        $subject = $_POST['WIDsubject'];

        //���������
        $total_fee = $_POST['WIDtotal_fee'];

        //��Ʒ�������ɿ�
        $body = $_POST['WIDbody'];





/************************************************************/

//����Ҫ����Ĳ������飬����Ķ�
$parameter = array(
		"service"       => $alipay_config['service'],
		"partner"       => $alipay_config['partner'],
		"seller_id"  => $alipay_config['seller_id'],
		"payment_type"	=> $alipay_config['payment_type'],
		"notify_url"	=> $alipay_config['notify_url'],
		"return_url"	=> $alipay_config['return_url'],
		
		"anti_phishing_key"=>$alipay_config['anti_phishing_key'],
		"exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		//����ҵ������������߿����ĵ�����Ӳ���.�ĵ���ַ:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
        //��"������"=>"����ֵ"
		
);

//��������
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "ȷ��");
echo $html_text;

?>
</body>
</html>