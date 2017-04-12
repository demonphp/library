# 1.find详讲

## 1.指定返回的键	  
	db.[documentName].find ({条件},{键指定})       
	数据准备persons.json	  
	1.1 查询出所有数据的指定键(name ,age ,country)			db.persons.find({},{name:1,age:1,country:1,_id:0})

## 2.查询条件

| 比较操作符 | 意义 | 示例 |
| --- | :---: |--- | 
|-----|------|------|
|$lt    |<	 | {age:{$gte:22,$lte:27}}|
|$lte	|<=  | ---|	
|$gt	|>   | ---|	
|$gte	|>=	 | ---|
|$ne	|!=	 |{age:{$ne:26}}| 
