#1.增加数据
#  1.使用主键冲突方式
#    insert into 表名 values(值列表) on duplicate key update 字段 = 值
#  2.使用替换插入
#    replace into 表名 (字段列表) values(值列表)
#  3.蠕虫复制(蠕虫能够一分为2,2分为4，在成倍增长)
#    insert into 表名 (字段列表) select 字段列表 from 表名;

#2.更新数据
#  1.基本语法：
#    update 表名 set 字段 = 值 [where条件]
#  2.高级语法：
#    update 表名 set 字段 = 值 [where条件]  [limit]

#3.删除数据
#  1.基本语法：
#    delete from 表名 [where条件]
#  2.高级语法：
#    delete from 表名 [where条件] [limit]
#  3.truncate 重置自增id
#    truncate 表名

#4.查询语句
#  1.基础语法：
#    select 字段列表 from 表名 [where条件]
#  2.高级语法：
#    select [select选项] 表达式 [from子句] [where子句] [group by 子句] [having 子句] [order by子句] [limit 子句]
#  3.select选项：
#     在查询得到数据是否需要进行合并，all表示获取所有数据（默认的），distinct将完全一致的记录进行合并








