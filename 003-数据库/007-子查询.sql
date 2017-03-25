#1.标量子查询：子查询返回的结果是一个字段单元
#  知道班级001，想要获得所有该班级的学生
   select * from student where class_id = (select * from class where name = '001');

#2.列子查询：子查询返回的结果是一个字段，但是有多个值
#  用户知道班级名称（001，002），想得到班级所有的学生信息。
   select * from student where class_id in (select c_id from class where name = '001' or name = '002');

#3.行子查询：子查询返回的结果是一行记录（一条记录：大于一个字段）
#  要求找出年龄最大，同时身高最高的学生。
   select * from student where (age,height) = (select max(age),max(height) from student);

#4.表子查询：返回的结果是一个二维表（多行多列）
#  获取每个班级中身高最高的一个学生
   select * from (select * from student order by height desc) as s where 1 group by class_id;