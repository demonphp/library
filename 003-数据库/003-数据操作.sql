#1.新增数据：
#  字段列表可以没有，意味着值列表里的字段数必须与表中的字段数完全一致
#  insert into 表名 (字段列表) values(值列表)
insert into mytable ('age','name') VALUES ('18','小明'),('20','小红');

#2.查看数据：select 字段列表 from 表名 [where 条件]
select * from mytable where age > 10;

#3.修改（更新）数据：update 表名 set 字段 = 值 [where条件]
update mytable set age = 19 where 'name' = '小明';

#4.删除数据：delete from 表名 [where条件]
delete from mytable where age > 19;








