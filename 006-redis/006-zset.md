# sorted set是set的一个升级版本，他在set的基础上增加了一个顺序属性，这一属性在添加修改元素的时候可以指定，每次指定后，zset会自动重新按新的值调整顺序。可以理解为有两列的mysql表，一列存value,一列存顺序。操作中的key理解为zset的名字。

（1）zadd
向名称为key的zset中添加元素。如果该元素存在，则更新其顺序。
语法：zadd 集合名  序号  内容

（2）zrange
获取有序集合中的内容

（3）zrem
删除名称为key的zset中的元素member。

（4）zincrby
如果在名称为key的zset中已经存在元素member,则该元素的score增加increment否则向该集合中添加该元素，其score的值为increment。

（5）zrank
返回名称为key的zset中member元素的排名（按score从小到大排序）即下标。

（6）zrevrank
返回名称为key的zset中member元素的排名（按score从大到小排序）即下标。

（7）zrevrange
返回名称为key的zset(按score从大到小顺序)中的index从start到end的所有元素。

（8）zrangebyscore
返回集合中score在给定区间的元素

（9）zcount
返回集合中score在给定区间的数量。

（10）zcard
返回集合中元素的个数

（11）zremrangebyrank
删除集合中排名在给定区间的元素。

（12）zremrangebyscore
删除集合中score在给定区间的元素。