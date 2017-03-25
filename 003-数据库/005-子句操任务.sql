#1.where操作
# 1.比较运算符：>，>=，<，<=，=（比较），!=，<>，in，between and，is [not] null
# 2.in：表示某个字段的值，在某个集合（包含多个数据）中
    select * from mytable where id in(2,3,4);
# 3.between and：语法是between A and B（A必须小于等于B），表示在某个区间内（闭区间）
    select * from mytable where `id` between 2 and 5;
# 4.is null判断数据是否为null
    select * from mytable where name is null;
# 5.逻辑运算符：&&(and)，||(or)，not
    select * from mytable where name = '小明' and age = '18';

#2.group by排序：根据分组字段进行排序
#  1.语法：group by 字段 [asc|desc]
#  2.统计函数：都是数学统计
#    count：统计所有的记录的个数，也可以是所有字段（不统计null）
#    max：统计分组后每组里面的最大值，通常是某个字段
#    min：统计最小
#    avg：统计平均数
#    sum：求和
#  3.回溯统计：每一层分组之后，都会在最终的结果上，再进行一次额外的统计
#    语法：在分组之后增加 with rollup
select count(*) from mytable group by age,name;


#3.having子句
#   1.相同点功能与where一样，用于做条件判断
#     where： 对数据源进行条件处理
#     having：对where得到数据内存进行处理
#   2.不同点：
#     having可以使用字段别名，而where不能
#     having可以使用统计函数
#   3.分组统计在数据操作的过程中经常使用，尤其是做一些报表开发。分组通常与分组函数一起使用。
      select count(*) as count from mytable where 1 group by age having count > 2;

#4.order by子句 主要是对字段进行排序，比较的依据是校对集。
#   1.asc默认的，    升序(小=>大)
#   2.desc降序排序， 降序(大=>小)

#5.limit子句
#   实际：限制数据查询的起始位置和返回数据的条数
#   语法：limit offset,number
#       offset：从查询得到结果中的第几条开始，在数据库里，offset从0开始
#       number：一共返回多少记录（返回的记录数不一定完全等于number数量）







