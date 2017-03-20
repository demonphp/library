#1.新增表：
#create table 表名(字段1 字段类型,字段2 字段类型)[表选项]
#  1.字段必须要有字段类型：字段 字段类型
#  2.字段与字段之间使用逗号分隔
#  3.最后一个字段不需要使用逗号
#  表选项
#  1.字符集：当前表的数据采用什么字符集保存，字符集以表的字符集为标准
#  2.存储引擎：当前表的数据采用什么样的存储引擎来存储
#  3.存储引擎：不同存储和处理数据的方式
#  InnoDB：只会创建一个表结构文件，其他的索引和数据存放在ibdata1文件中
#  Myisam：会创建三个文件，一个是结构文件，一个是数据文件，一个是索引文件
#eg:
CREATE TABLE IF NOT EXISTS `mytable` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '分类的名称',
  `age` tinyint(2) NOT NULL DEFAULT 0 COMMENT '年龄',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '该文章删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='学生表' AUTO_INCREMENT=1;

#2.查看表：
#  1.查看表基本信息：
  show tables;
  show tables like 'pattern';
# 2.查看表的创建语句：
show create table `mytable`;
# 3.查看表结构：desc|describe 表名/show columns from 表名
  desc `l_blog_art`;

#3.修改表
#  1.可以修改表的名字，表的字段的增删改查，字段的属性的修改，字段的位置的修改
#  alter table 表名 [add/modify/drop] [column] 字段名字 [字段类型] [字段位置]
   alter table `mytable` add age int after id;
#  2.增加字段
#   alter table 表名 add column 字段名字 字段类型 [位置]
#  3.修改字段(修改字段位置，修改字段的类型，修改字段的名字)
#    修改字段类型+字段位置
#  4.修改字段名字
#    alter table 表名 change 旧字段 new字段 字段类型 字段位置
#  5.删除字段
#    alter table 表名 drop 字段名字
#  6.语法：
#    rename table 旧表名 to 新表名
#  7.删除表：
#    drop table if exists 表名





