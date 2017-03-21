# Redis hash是一个string类型的field和value的映射表。它的添加、删除操作都是0（1）（平均）。hash特别适合用于存储对象。相较于将对象的每个字段存成单个string类型。将一个对象存储在hash类型中会占用更少的内存，并且可以更方便的存取整个对象。

（1）hset
设置hash field为指定值，如果 key不存在，则先创建。
语法：
hset  哈希名称  字段名称   值

（2）hget
取出hash field的值。语法：hget 哈希名称  字段名称

（3）hsetnx
设置hash field为指定值，如果key不存在，则先创建，如果存在则返回0。

（4）hmset
同时设置hash的多个field
语法：hmset 哈希名称  field1  value1 field2 value2

（5）hmget
获取全部指定的hash field。
语法：hmget 哈希名称 field1 field2

（6）hincrby
指定的 hash  field加上给定的值。

（7）hexists
测试指定的 field是否存在。

（8）hlen
返回指定hash的field数量。

（9）hdel
删除指定hash的field
语法：hdel 哈希名 field

（10）hkeys
返回hash的所有field

（11）hvals
返回hash的所有 value。

（12）hgetall
获取某个hash中全部的field及value