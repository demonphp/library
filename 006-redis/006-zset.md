# sorted set
  sorted set是set的一个升级版本，他在set的基础上增加了一个顺序属性，这一属性在添加修改元素的时候可以指定，每次指定后，zset会自动重新按新的值调整顺序。可以理解为有两列的mysql表，一列存value,一列存顺序。操作中的key理解为zset的名字。

##（1）zadd向名称为key的zset中添加元素。如果该元素存在，则更新其顺序。
      语法：zadd 集合名     序号  内容
           zadd zs_user1  1    hong
           zadd zs_user2  1    ming

##（2）zrange 获取有序集合中的内容
      语法:zrange 集合 开始位置 结束位置 withscores
           zrange zs_user1 0 -1 withscores

##（3）zrem 删除名称为key的zset中的元素member。
      语法: zrem 集合 值
           zrem zs_user1 hong

##（4）zincrby 如果在名称为key的zset中已经存在元素member,则该元素的score增加increment否则向该集合中添加该元素，其score的值为increment。
      语法: zincrby key 要增加的值 原值
           zincrby zs_num 2 1

##（5）zrank 返回名称为key的zset中member元素的排名（按score从小到大排序）即下标。
      语法:  zrank 集合     值
            zrank zs_user1 hong

##（6）zrevrank 返回名称为key的zset中member元素的排名（按score从大到小排序）即下标。
      语法:  zrevrank 集合     值
            zrevrank zs_user1 hong

##（7）zrevrange 返回名称为key的zset(按score从大到小顺序)中的index从start到end的所有元素。
      语法:  zrevrange 集合 开始值 结束值 withscores
            zrevrange zs_user1 0 -1   withscores

##（8）zrangebyscore 返回集合中score在给定区间的元素
      语法:  zrangebyscore 集合      值开始 值结束 withscores
            zrangebyscore zs_user1  1      2    withscores

##（9）zcount 返回集合中score在给定区间的数量。
      语法:  zcount 集合      值开始  值结束
            zcount zs_user1  1      2

##（10）zcard 返回集合中元素的个数
       语法: zcard 集合
            zcard zs_num

##（11）zremrangebyrank 删除集合中排名在给定区间的元素。
      语法:  zremrangebyrank 集合 开始值 结束值
            zremrangebyrank zs_user1  0 -1

##（12）zremrangebyscore 删除集合中score在给定区间的元素。
      语法:  zremrangebyscore  集合      值开始  值结束
            zremrangebyscore   zs_user1 1      2
