#创建一个公司测试表
create table t_company(
    id int unsigned primary key auto_increment,
    name varchar(32) not null comment '公司名称',
    brief  varchar(32) not null comment '摘要',
    address varchar(100) not null comment '地址'
)COMMENT='公司表' ENGINE=InnoDB AUTO_INCREMENT=1;

INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司A', '公司A', '广州天河体育中心太古汇A');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司B', '公司B', '广州天河体育中心太古汇B');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司C', '公司C', '广州天河体育中心太古汇C');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司D', '公司D', '广州天河体育中心太古汇D');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司E', '公司E', '广州天河体育中心太古汇E');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司F', '公司F', '广州天河体育中心太古汇F');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司G', '公司G', '广州天河体育中心太古汇G');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司H', '公司H', '广州天河体育中心太古汇H');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司I', '公司I', '广州天河体育中心太古汇I');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司J', '公司J', '广州天河体育中心太古汇J');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司K', '公司K', '广州天河体育中心太古汇K');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司L', '公司L', '广州天河体育中心太古汇L');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司M', '公司M', '广州天河体育中心太古汇M');
INSERT INTO `t_company` (`id`, `name`, `brief`, `address`) VALUES (NULL, '公司N', '公司N', '广州天河体育中心太古汇N');

insert into t_company (`name`, `brief`, `address`) select `name`, `brief`, `address` from t_company;





