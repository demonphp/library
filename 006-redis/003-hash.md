# Redis hash
  是一个string类型的field和value的映射表。它的添加、删除操作都是0（1）（平均）。hash特别适合用于存储对象。相较于将对象的每个字段存成单个string类型。将一个对象存储在hash类型中会占用更少的内存，并且可以更方便的存取整个对象。

##（1）hset 设置hash field为指定值，如果 key不存在，则先创建。
      语法：hset  哈希名称  字段名称   值
          hset user1 name xiaohong
          hset user2 name xiaoming

##（2）hget 取出hash field的值。
      语法：hget 哈希名称  字段名称
           hget user1 name
           hget user2 name


##（3）hsetnx  设置hash field为指定值，如果key不存在，则先创建，如果存在则返回0,存在返回1
      语法: hsetnx field key value
           hsetnx user1 name xiaozhu

##（4）hmset  同时设置hash的多个field
      语法：hmset 哈希名称  field1  value1 field2 value2
      hmset user3 name xiaoli  age 18 sorce 80
      hmset user4 name xiaogou age 19 sorce 90

##（5）hmget  获取全部指定的hash field。
      语法：hmget 哈希名称 field1 field2
           hmget user3 name age sorce
             1)  "xiaoli"
             2)  "18"
             3)  "90"

##（6）hincrby 指定的 hash  field加上给定的值。
      语法：hincrby hash field  要加的值
           hincrby user3 sorce 10

##（7）hexists 测试指定的 field是否存在,存在返回1，不存在返回0
      语法: hexists hash field
           hexists user3 num

##（8）hlen 返回指定hash的field数量。
      语法: hlen hash
           hlen user3

##（9）hdel 删除指定hash的field
      语法：hdel hash  field
           hdel user3 sorce

##（10）hkeys 返回hash的所有field
      语法：hkeys hash
           hkeys user3
           1)  "name"
           2)  "age"

##（11）hvals 返回hash的所有 value。
      语法：hvals hash
           hvals user3
           1)  "xiaoli"
           2)  "18"

##（12）hgetall 获取某个hash中全部的field及value
       语法：hgetall hash
            hgetall user3
            1)  "name"
            2)  "xiaoli"
            3)  "age"
            4)  "18"
