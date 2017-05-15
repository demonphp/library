package com.alipay.config;

/* *
 *������AlipayConfig
 *���ܣ�����������
 *��ϸ�������ʻ��й���Ϣ������·��
 *�汾��3.4
 *�޸����ڣ�2016-03-08
 *˵����
 *���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 *�ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
 */

public class AlipayConfig {
	
//�����������������������������������Ļ�����Ϣ������������������������������

	// ���������ID��ǩԼ�˺ţ���2088��ͷ��16λ��������ɵ��ַ������鿴��ַ��https://b.alipay.com/order/pidAndKey.htm
	public static String partner = "";
	
	// �տ�֧�����˺ţ���2088��ͷ��16λ��������ɵ��ַ�����һ��������տ��˺ž���ǩԼ�˺�
	public static String seller_id = partner;

	//�̻���˽Կ,��ҪPKCS8��ʽ��RSA��˽Կ���ɣ�https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.nBDxfy&treeId=58&articleId=103242&docType=1
	public static String private_key = "";
	
	// ֧�����Ĺ�Կ,�鿴��ַ��https://b.alipay.com/order/pidAndKey.htm
	public static String alipay_public_key  = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB";

	// �������첽֪ͨҳ��·��  ��http://��ʽ������·�������ܼ�?id=123�����Զ����������������������������
	public static String notify_url = "http://�̻���ַ/create_direct_pay_by_user-JAVA-GBK/notify_url.jsp";

	// ҳ����תͬ��֪ͨҳ��·�� ��http://��ʽ������·�������ܼ�?id=123�����Զ����������������������������
	public static String return_url = "http://�̻���ַ/create_direct_pay_by_user-JAVA-GBK/return_url.jsp";

	// ǩ����ʽ
	public static String sign_type = "RSA";
	
	// �����ã�����TXT��־�ļ���·������AlipayCore.java���е�logResult(String sWord)��ӡ������
	public static String log_path = "C:\\";
		
	// �ַ������ʽ Ŀǰ֧�� gbk �� utf-8
	public static String input_charset = "gbk";
		
	// ֧������ �������޸�
	public static String payment_type = "1";
		
	// ���õĽӿ����������޸�
	public static String service = "create_direct_pay_by_user";


//�����������������������������������Ļ�����Ϣ������������������������������
	
//�������������������� �����������÷�������Ϣ�����û��ͨ�����㹦�ܣ�Ϊ�ռ��� ������������������������������
	
	// ������ʱ���  ��Ҫʹ����������ļ�submit�е�query_timestamp����
	public static String anti_phishing_key = "";
	
	// �ͻ��˵�IP��ַ �Ǿ�����������IP��ַ���磺221.0.0.1
	public static String exter_invoke_ip = "";
		
//�������������������������������÷�������Ϣ�����û��ͨ�����㹦�ܣ�Ϊ�ռ��� ������������������������������
	
}

