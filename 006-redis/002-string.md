# String是最简单的类型

  一个 key对应一个Value，String类型是二进制安全的。

##（1）set(设置键，值)
    语法：set  键名称  值
         set name xiaoming

##（2）get  获取key对应的string值，如果key不存在返回 nil,
    语法：get 键值
         get name

##（3）setnx 设置键先判断一下该键是否存在，如果key已经存在，返回0,nx是not exist的意思。若键已经存在，则设置不成功，返回0
         setnx name xiaohong

##（4）setex 设置key对应的值为string类型的value,并指定此键值对应的有效期。
    语法：setex 名称 有效期  值(秒)
         setex name 10 xiaoming

##（5）setrange  替换字符串中某些字符,并返回设置好的长度值　
    语法：setrange    键       开始替换的序号   替换为的内容
         setrange    name     3             hong

##（6）mset  一次设置多个key的值，成功返回ok表示所有的值都设置了，失败返回0表示没有任何值被设置。
    语法： mset 键1   值1       键2    值2
          mset name  xiaoming age     18

##（7）msetnx
    一次设置多个key的值，成功返回ok表示所有的值都设置了，失败返回0表示没有任何值被设置，但是不会覆盖已经存在的key。

##（8）getset  设置key的值，并返回key的旧值。（设置新值，获取旧值。）
    语法:  getset 健   值
          getset name xiaohong


##（9）getrange  获取key的value值的范围内的子字符串
    语法:  getrange key 起始范围  结束范围
          getrange name 0 3
          返回：
              "xiao"

##（10）mget  一次获取多个key的值，如果对应key不存在则对应返回null。
     语法: mget key1 key2
          mget name phone
          返回:
              1)  "xiaohong"
              2)   null

##（11）incr|incrby (只能int类型相加对key的值做加加操作，并返回新的值。加指定值，key不存在时候会设置key,并认为原来的value是0。)
    语法: incr 键
         incr age

##（12）decr|decrby(只能int)对key的值做减减操作,减指定值，key不存在时候会设置key,并认为原来的value是0。
        decr num

##（13）append 给指定key的字符串追加value,返回新字符串值的长度。
        append name  li

##（14）strlen  取指定key的value值的长度。
       strlen name