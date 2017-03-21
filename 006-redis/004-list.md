# list是一个链表结构，主要功能是push、pop、获取一个范围的所有值等等，操作中key 理解为链表的名字。redis的list类型其实就是一个每个子元素都是string 类型的双向链表。我们可以通过push、pop操作从链表的头部或者尾部添加删除元素，这样list即可以作为栈，又可以作为队列。

（1）lpush
在key对应list的头部添加字符串元素。
语法：lpush 链表名称  值内容

（2）lrange
获取链表里面的值，语法：lrange 链表名称  0 -1
注意0 和 -1 表示取值范围，从头部到尾部。

（3）rpush
在key对应list的尾部添加字符串元素。
语法：rpush 链表名称  值内容


（3）linsert
在key对应list的特定位置前或后添加字符串。

（4）lset
设置list中指定下标的元素值。注：下标从0开始计算

（5）lrem
从key对应list中删除n个和value相同的元素。（n<0从尾删除，n=0全部删除）

（6）ltrim
保留指定key的值范围内的数据。

（7）lpop
从list的头部删除元素，并返回删除元素。

（8）rpop
从 list的尾部删除元素，并返回删除元素。

（9）rpoplpush
从第一个list的尾部移除元素并添加到第二个list的头部。

（10）lindex
返回名称为key的list中 index位置的元素。

（11）llen
返回key对应list的长度。