# 1.Document数据插入
## 1.插入文档	  
	db.[documentName].insert({})

## 2.批量插入文档         
	shell 这样执行是错误的 db.		
	[documentName].insert([{},{},{},……..])         
	shell 不支持批量插入  
	想完成批量插入可以用mongo的应用驱动或是shell的for循环

## 3.Save操作          
	save操作和insert操作区别在于当遇到_id相同的情况下          
	save完成保存操作          
	insert则会报错

# 2.Document数据删除
## 1.删除列表中所有数据	  
	db.[documentName].remove()         
	集合的本身和索引不会别删除
## 2.根据条件删除        
	db.[documentName].remove({})	  
	删除集合text中name等于uspcat的纪录       
	 db.text.remove({name:”uspcat”})
## 3.小技巧        
	如果你想清楚一个数据量十分庞大的集合        
	直接删除该集合并且重新建立索引的办法        
	比直接用remove的效率和高很多

# 3.Document数据更新
## 1.强硬的文档替换式更新操作	  
	db.[documentName].update({查询器},{修改器})         
	强硬的更新会用新的文档代替老的文档

## 2.主键冲突的时候会报错并且停止更新操作         
	因为是强硬替换当替换的文档和已有文档ID冲突的时候         
	则系统会报错

## 3.insertOrUpdate操作         
	目的:查询器查出来数据就执行更新操作,查不出来就替换操作	   
	做法:db.[documentName].update({查询器},{修改器},true)

## 4.批量更新操作         
	默认情况当查询器查询出多条数据的时候默认就修改第一条数据         
	如何实现批量修改         
	db.[documentName].update({查询器},{修改器},false, true)

## 5.使用修改器来完成局部更新操作

| 修改器名称 | 语法 | 案例 | 说明| 
| --- | :---: | :---: | --- | 
| $set | {$set:{field: value}} | {$set:{name:”uspcat”}} | 它用来指定一个键值对,如果存在键就进行修改不存在则进行添加. | 
| $inc | {$inc:{field: value }} | {$set:{name:”uspcat”}} | 只是使用与数字类型,他可以为指定的键对应的数字类型的数值进行加减操作. | 
| $unset | {$unset:{field: 1}} | {$unset:{“name":1} | 他的用法很简单,就是删除指定的键 | 
| $push| {$push:{field: value }} | $push:{books:”JS”} | 1.如果指定的键是数组增追加新的数值 2.如果指定的键不是数组则中断当前操作Cannot apply $push/$pushAll modifier to non-array 3.如果不存在指定的键则创建数组类型的键值对 | 
| $pushAll| {$pushAll:{field : array}}|{$push:{books:[“EXTJS”,”JS”]} | 用法和$push相似他可以体谅添加数组数据 | 
| $addToSet| $addToSet{$addToSet:{field: value}}|{$addToSet: { books:”JS”}|目标数组存在此项则不操作,不存在此项则加进去 | 
| $pop| {$pop:{field: value}}|{$pop:{name:1}} {$pop:{name:-1}}|从指定数组删除一个值1删除最后一个数值,-1删除第一个数值| 
| $pull|{ $pull: { field : value } }|{ $pull : { “book" : “JS” } }|删除一个被指定的数值 | 
| $pullAll| { $pullAll: { field : array} }|{ $pullAll: { “name":[“JS”,”JAVA”] } | 一次性删除多个指定的数值|
| $| { $push : { field : value } }|{ $push : { books:”JS”} | |

	1.数组定位器,如果数组有多个数值我们只想对其中一部分进行操作我们就要用到定位器($)
	例如有文档{name:”YFC”,age:27,books:[{type:’JS’,name:”EXTJS4”},{type:”JS”,name:”JQUERY”},{type:”DB”,name:”MONGODB”}]}
	我们要把type等于JS的文档增加一个相同的作者author是USPCAT
	办法:db.text.update({"books.type":"JS"},{$set:{"books.$.author":"USPCAT"}})

# 6.$addToSet与$each结合完成批量数组更新	   
	db.text.update({_id:1000},{$addToSet:{books:{$each:[“JS”,”DB”]}}})          
	$each会循环后面的数组把每一个数值进行$addToSet操作

# 7.存在分配与查询效率	  
	当document被创建的时候DB为其分配没存和预留内存当修改操作          
	不超过预留内层的时候则速度非常快反而超过了就要分配新的内存	    
	则会消耗时间

# 8.runCommand函数和findAndModify函数
```javascript 	
	runCommand可以执行mongoDB中的特殊函数	 
	findAndModify就是特殊函数之一他的用于是返回update或remove后的文档  
	runCommand({“findAndModify”:”processes”,       	
	query:{查询器},		sort{排序},		 new:true		update:{更新器},		remove:true       }).value        ps = db.runCommand({               
	"findAndModify":"persons",               "query":{"name":"text"},		      "update":{"$set":{"email":"1221"}},		     
"new":true }).value do_something(ps)
	http://www.cppblog.com/byc/archive/2011/07/15/151063.aspx
```
