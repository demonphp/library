#1.创建数据库并设置字符集
#   数据库命名规范
#   1.使用字母，下划线和数字构成
#   2.不能是关键字，如果是关键字，需要使用反引号将名字包裹
#   3.可以使用中文作为数据库名字，但是也需要使用反引号（强烈建议：不用使用中文）
create database `mydatabase` charset utf8;

#2.查看数据库
#   1.查看数据库基本信息：
show databases;
#   2.模糊查询：%匹配任何内容，_表示匹配一个字符 \_匹配下划线
show databases like 'demo_%';   #匹配一到多个
show databases like 'demo\_%';  #匹配下划线，然后匹配多个

#3.查看数据库创建语句：
show create database `mydatabase`;

#4.修改数据库：数据库名称不可修改，只能修改数据库的库选项
alter database `mydatabase` charset gbk;

#5.删除数据库：
drop database `mydatabase`;


