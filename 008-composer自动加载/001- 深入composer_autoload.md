# 1.文章来源
    http://www.cnblogs.com/CpNice/p/4119925.html(PHP自动加载类__autoload()浅谈)
    http://www.cnblogs.com/myluke/archive/2011/06/25/2090119.html(PHP中spl_autoload_register函数的用法)
    https://laravel-china.org/topics/1002(深入 Composer autoload)
    http://www.cnblogs.com/yue-blog/p/5904275.html(Composer实现PHP中类的自动加载)

# 2.自动加载的类型
    总体来说 composer 提供了几种自动加载类型
    1.classmap
        读取某个文件夹中所有的文件 然后再 vendor/composer/autoload_classmap.php 中怒将所有的 class 的 namespace + classname 生成成一个 key => value 的 php 数组
    2.psr-0
        现在这个标准已经过时了。当初制定这个标准的时候主要是在 php 从 5.2 刚刚跃迁到 5.3+ 有了命名空间的概念。所以这个时候 psr-0 的标准主要考虑到了 <5.2 的 php 中 类似 Acme_Util_ClassName 这样的写法
    3.psr-4
        最简单来讲就是可以把 prs-4 的 namespace 直接想想成 file structure
    4.files
        然而这还是不够。因为可能会有一些全局的 helper function 的存在。直接引入该类文件

# 3.过程
    1.先查看前面两篇文章
    2.再从part1->part4顺序
    3.再深入查看part5代码,并从第三章开始学(part5代码从laravel框架中拿出来的)

# 4.为什么总是要 composer dump-autoload

    因为 database 文件夹使用(查看composer.json) classmap 来做加载的。所以只有在打了 composer dumpautoload 之后 composer 才会
    更新 autoload_classmap 的内容。

# 5.怎样可以避免一直打 composer dump-autoload

    可以怒用 psr-4 注册一个文件夹这样增减文件就不用再管了。Composer\ClassLoader 会自动检查 composer.json 中注册的 psr-4 入口然后根据 psr-4 去自动查找文件。

# 6.生产环境为什么要 composer dump-atoload -o

    可以看到 psr-4 或者 psr-0 的自动加载都是一件很累人的事儿。基本是个 O(n2) 的复杂度。另外有一大堆 is_file 之类的 IO 操作所以性能堪忧。
    所以给出的解决方案就是空间换时间.
    Compsoer\ClassLoader 会优先查看 autoload_classmap 中所有生成的注册类。如果在classmap 中没有发现再 fallback 到 psr-4 然后 psr-0
    所以当打了 composer dump-autoload -o 之后，composer 就会提前加载需要的类并提前返回。这样大大减少了 IO 和深层次的 loop。

