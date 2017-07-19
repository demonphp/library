#1.switch CASE
  select case status when 1 then '成功' when 2 then '失败' else '其他' end from user;

#case后面紧跟要被作为判断的字段
#when后面跟判断条件
#then后面跟结果
#else相当于default
#end是语句结束语

