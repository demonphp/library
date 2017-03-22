# list
  是一个链表结构，主要功能是push、pop、获取一个范围的所有值等等，操作中key 理解为链表的名字。
  redis的list类型其实就是一个每个子元素都是string 类型的双向链表。我们可以通过push、pop操
  作从链表的头部或者尾部添加删除元素，这样list即可以作为栈，又可以作为队列。
  1、 ArrayList使用数组方式存储数据，所以根据索引查询数据速度快，而新增或者删除元素时需要设计到位移操作，所以比较慢。
  2、 LinkedList使用双向链接方式存储数据，每个元素都记录前后元素的指针，所以插入、删除数据时只是更改前后元素的指针指向即可，速度非常快，然后通过下标查询元素时需要从头开始索引，所以比较慢。

##（1）lpush 在key对应list的头部添加字符串元素。
       语法：lpush 链表名称  值内容
       lpush list1 1
       lpush list1 2
       lpush list1 3

##（2）lrange 获取链表里面的值，
       语法: lrange 链表名称 开始位置 结束位置
            lrange list1 1 4

##（3）rpush 在key对应list的尾部添加字符串元素。
       语法：rpush 链表名称  值内容
       rpush list1 6

##（3）linsert 在key对应list的特定位置前或后添加字符串。(不太准确,当值有相同的时候,永远插在最前最后)
        语法: linsert list  after(before) 值
             linsert list1  before 1 99;
             linsert list1  after  2 98;

##（4）lset 设置list中指定下标的元素值。注：下标从0开始计算
        语法: lset list1 0 100

##（5）lrem 从key对应list中删除n个和value相同的元素。（n<0从尾删除，n=0全部删除)超过数量会删除全部
        语法: lrem list n 值
              lrem list1 3 99

##（6）ltrim 保留指定key的值范围内的数据。
      语法: ltrim list 开始值 结束值
            ltrim list1 1  10

##（7）lpop  从list的头部删除元素，并返回删除元素。
      语法: lpop list
            lpop list1

##（8）rpop  从list的尾部删除元素，并返回删除元素。
      语法: rpop list
            rpop list

##（9）rpoplpush 从第一个list的尾部移除元素并添加到第二个list的头部。
      语法: rpoplpush list1 list2

##（10）lindex 返回名称为key的list中 index位置的元素。
       语法:lindex list 位置
            lindex list1 6

##（11）llen 返回key对应list的长度。
        语法: llen list
            llen list1