## 文章来源
http://blog.csdn.net/u013474436/article/details/53131259

## 前言

Redis支持的客户端种类非常多，包括C、Java、PHP、Python等，本文主要介绍PHP客户端的安装和使用。 
Redis的客户端实际上担负了通过网络协议与Redis Server进行通信的过程，通信的过程必须遵循协议规范，让客户的调用更加符合特定语言的使用习惯。现有PHP客户端：rediska、phpredis、Predis。这些客户端中，有纯PHP的实现方案，也有二进制版本的实现方案。

特性比较

官方提供的PHP客户端列表如下：

-	predis	phpredis	Rediska
易扩展	∆		∆
客户端策略和Hash算法定义	∆		∆
实现方式	纯PHP	PHP扩展（C语言）	纯PHP
测试数据（本地环境下）	18900 SET/sec using 12 bytes for both key and value	29000 SET/sec using 12 bytes for both key and value	
18300 GET/sec while retrieving the very same values	30000 GET/sec while retrieving the very same values	
0.210 seconds to fetch 30000 keys using KEYS *.	0.037 seconds to fetch 30000 keys using “KEYS *”“.	
测试结果（网络环境下）	3150 SET/sec using 12 bytes for both key and	3300 SET/sec using 12 bytes for both key and	
3150 GET/sec while retrieving the very same	3300 GET/sec while retrieving the very same	
0.212 seconds to fetch 30000 keys using “KEYS *”.	0.088 seconds to fetch 30000 keys using “KEYS *”.	
Predis

Predis是一个灵活和特性完备（PHP>5.3）的支持Redis的PHP客户端。当前版本为0.6.3，默认不支持PHP5.2。 
主要特性如下：

 1. 完整的支持从1.2到2.4的Redis，并且支持当前正在开发的版本；
 2. 提供客户端实现的一致性哈希算法，支持自定义；
 3. 在单个或聚合连接中支持命令管道；（Command pipelining on single and aggregated connections） 
 4. 能够通过TCP/IP或者Unix domain sockets连接到redis，支持持久连接；
 5. 自动连接Redis实例，使用“懒惰”方式，只在第一个命令发出时执行连接；
 6. 可以灵活定义客户端的命令集合； 
phpredis

这是一个二进制版本的PHP客户端，按照的说法，效率要比Predis高。这个版本支持作为Session的Handler。这个扩展的有点在于无需加载任何外部文件，使用比较方便。缺点在于难于扩展，一般的PHP程序员无法对其做出扩展。考虑到Redis正在飞速发展过程中，缺乏扩展的特性还是有些影响的，需要维护过程中注意进行升级更新。

Rediska

rediska 目前(2011年)还处于 beta 阶段。他的代码托管在github上，可以方便的获取。另外也提供了PEAR版本，所以获取和安装都非常方便。可以使用PEAR包安装。

http://www.phperz.com/database/nosql/031625613201225613.html