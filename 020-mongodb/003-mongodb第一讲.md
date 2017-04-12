# 1.创建一个数据库
	use [databaseName]
	但如果什么都不干就离开这个空数据库就会被删除

# 2.查看所有数据库
	show dbs

# 3.给指定的数据库添加集合并且添加记录
	db.[documentName].insert({...})

# 4.查看数据库中的所有文档
	show collections

# 5.查询制定文档的数据
	查看所有db.[documentName].find()
	查看第一条数据db.[documentName].findOne()

# 6.更新文档数据
	db.[documentName].update({查询条件},{更新内容})
	例子:
	var p = db.persons.findOne()
	db.persons.update(p,{name:'uspact'})

# 7.删除文档中的数据
	db.[documentName].remove({...})
	例子:db.persons.remove({name:'uspact'})

# 8.删除库中的集合
	db.[documentName].drop()
	
# 9.删除数据库
	db.dropDatabase()

# 10.shell中的help
	里面有所有的shell可以完成命令帮助
	全局的help数据库相关的db.help() 集合相关的db.[documentName].help()

# 11.mongoDB的API
	http://api.mongodb.org/js

# 数据库和集合命名规范
	1.不能是空字符串
	2.不得含有' '(空格)、，、$、/、\、和\O(空字符);
	3.应全部小写
	4.最多64个字节
	5.数据库名不能与现有系统保留库同名,如admin,local,及config
	

	这样的集合名字也是合法的
	db-text但是不能通过db.[documentName]得到了,要改为db.getCollection(documentName)
	因为db-text会被当成是减法操作

# mongoDB的shell内置javascript引擎可以直接执行JS代码
	function insert(object) {
		db.getCollection('db-text').insert(object)
	}
	insert({age:32})

# shell可以用eval
	db.eval("return 'uspact'")