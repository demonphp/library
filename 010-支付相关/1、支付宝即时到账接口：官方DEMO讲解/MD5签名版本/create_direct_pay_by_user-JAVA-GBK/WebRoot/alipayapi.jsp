<%
/* *
 *���ܣ���ʱ���˽��׽ӿڽ���ҳ
 *�汾��3.4
 *�޸����ڣ�2016-03-08
 *˵����
 *���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 *�ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���

 *************************ע��*****************
 *������ڽӿڼ��ɹ������������⣬���԰��������;�������
 *1�������ĵ����ģ�https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.KvddfJ&treeId=62&articleId=103740&docType=1��
 *2���̻��������ģ�https://cshall.alipay.com/enterprise/help_detail.htm?help_id=473888��
 *3��֧�����ģ�https://support.open.alipay.com/alipay/support/index.htm��
 *�������ʹ����չ���������չ���ܲ�������ֵ��
 **********************************************
 */
%>
<%@ page language="java" contentType="text/html; charset=gbk" pageEncoding="gbk"%>
<%@ page import="com.alipay.config.*"%>
<%@ page import="com.alipay.util.*"%>
<%@ page import="java.util.HashMap"%>
<%@ page import="java.util.Map"%>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gbk">
		<title>֧������ʱ���˽��׽ӿ�</title>
	</head>
	<%
		////////////////////////////////////�������//////////////////////////////////////

        //�̻������ţ��̻���վ����ϵͳ��Ψһ�����ţ�����
        String out_trade_no = new String(request.getParameter("WIDout_trade_no").getBytes("ISO-8859-1"),"GBK");

        //�������ƣ�����
        String subject = new String(request.getParameter("WIDsubject").getBytes("ISO-8859-1"),"GBK");

        //���������
        String total_fee = new String(request.getParameter("WIDtotal_fee").getBytes("ISO-8859-1"),"GBK");

        //��Ʒ�������ɿ�
        String body = new String(request.getParameter("WIDbody").getBytes("ISO-8859-1"),"GBK");

		
		
		//////////////////////////////////////////////////////////////////////////////////
		
		//������������������
		Map<String, String> sParaTemp = new HashMap<String, String>();
		sParaTemp.put("service", AlipayConfig.service);
        sParaTemp.put("partner", AlipayConfig.partner);
        sParaTemp.put("seller_id", AlipayConfig.seller_id);
        sParaTemp.put("_input_charset", AlipayConfig.input_charset);
		sParaTemp.put("payment_type", AlipayConfig.payment_type);
		sParaTemp.put("notify_url", AlipayConfig.notify_url);
		sParaTemp.put("return_url", AlipayConfig.return_url);
		sParaTemp.put("anti_phishing_key", AlipayConfig.anti_phishing_key);
		sParaTemp.put("exter_invoke_ip", AlipayConfig.exter_invoke_ip);
		sParaTemp.put("out_trade_no", out_trade_no);
		sParaTemp.put("subject", subject);
		sParaTemp.put("total_fee", total_fee);
		sParaTemp.put("body", body);
		//����ҵ������������߿����ĵ�����Ӳ���.�ĵ���ַ:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.O9yorI&treeId=62&articleId=103740&docType=1
        //��sParaTemp.put("������","����ֵ");
		
		//��������
		String sHtmlText = AlipaySubmit.buildRequest(sParaTemp,"get","ȷ��");
		out.println(sHtmlText);
	%>
	<body>
	</body>
</html>
