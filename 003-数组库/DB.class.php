<?php
	/*	专门操作数据mysql的基础类
	 *	默认已经设置好连接数据库的基本信息，如有需要另外指定，指在创建类时传一个数组
	 *	数组格式如下示例
	 * 	@示例 $dbinfo = array(
		*		'host' => 'localhost',	
		*		'port' => '3306', 
		*		'dbname' => 'project'
		*   ) 
	 *	连接功能:1.连接mysql,2.设置好字符集,3.选择数据库
	 *	增删改查功能:db_insert(),db_exec(),db_getOne,db_getALL
	 */
	class DB {
		//定义属性 
		protected $host;
		protected $port;
		protected $user;
		protected $pass;
		protected $charset;
		protected $dbname;
		//连接属性
		protected $link;
	   /*
		* 构造方法:初始化属性
		* @param1 array $dbinfo = array(),包含了数据库连接的基本信息
		* @示例 $dbinfo = array(
		*		'host' => 'localhost',	
		*		'port' => '3306', 
		*		'dbname' => 'project'
		*   ) 
		*/
		public function __construct($dbinfo = array()) {
			//dbinfo默认为空:表示不想修改,应该使用系统默认
			//初始化属性:判断用户是否传递了对应的参数
			$this->host = isset($dbinfo['host']) ? $dbinfo['host'] : 'localhost';
			$this->port = isset($dbinfo['port']) ? $dbinfo['port'] : '3306';
			$this->user = isset($dbinfo['user']) ? $dbinfo['user'] : 'root';
			$this->pass = isset($dbinfo['pass']) ? $dbinfo['pass'] : 'root';
			$this->charset = isset($dbinfo['charset']) ? $dbinfo['charset'] : 'utf8';
			$this->dbname = isset($dbinfo['dbname']) ? $dbinfo['dbname'] : 'project1';
			//连接认证
			$this->db_connect();  //调用连接数据库
			$this->db_charset();  //设置字符集
			$this->db_selectdb(); //选择数据库的
		}
		
	   /*
		*  连接认证:mysql_connect
		*/
		
		protected function db_connect() {
			//连接认证
			$this->link = mysql_connect($this->host . ':' . $this->port,$this->user,$this->pass);
			//判断连接是否成功
			if(!$this->link) {
				//连接失败:真实环境应该return false,将错误信息写入日志，并且通知管理员
				echo '数据库连接失败!<br/>';
				echo '错误编码:' . mysql_errno() . '<br/>';
				echo '错误信息:' . mysql_error() . '<br/>';
				exit; //终止脚本执行
			}
		}
		
	   /*	
		*	设置字符集
		*/
		protected function db_charset() {
			//设置字符集
			$sql = "set names {$this->charset}";
			//调用自己的错误处理方法
			$this->db_query($sql);
		}
		
	   /*	
		*	选择数据库
		*/
		protected function db_selectdb() {
			//选择数据库
			$sql = "use {$this->dbname}";
			//调用自己的错误处理方法
			$this->db_query($sql);
		}
		
	   /*
		*	SQL错误处理方法
		*	@param1 string $sql,要执行的sql语句
		*	@return mixed  true或者结果集
		*/
		protected function db_query($sql) {
			//执行sql
			$res = mysql_query($sql);
			//判断sql是否出错
			if(!$res) {
				//SQL语句语法错误 
				echo 'SQL语句语法错误!<br/>';
				echo '错误编码:' . mysql_errno() . '<br/>';
				echo '错误信息:' . mysql_error() . '<br/>';
				exit; //终止脚本执行
			}
			return $res;
		}
		
	   /*
	    *	新增数据: 数据入库
		*	@param1	string $sql
		*	@return int $id 自增长号
		*/
		protected function db_insert($sql) {
			//调用自己的错误处理方法
			$this->db_query($sql);
			//返回自增长id
			return mysql_insert_id();
		}
		
	   /*
	    *	修改与删除数据
		*	@param1	string $sql
		*	@return int 返回受影响的行数
		*/
		protected function db_exec($sql) {
			//调用自己的错误处理方法
			$res = $this->db_query($sql);
			//返回受影响的行数
			return $res;
		}
		
	   /*
		*	查询一条数据
		*	@param1 string $sql
		*	@return mixed,成功则返回一维数组,失败则返回false
		*/
		
		public function db_getOne($sql) {
			//执行，返回结果
			$res = $this->db_query($sql);
			//返回结果,mysql_fetch_assoc,有结果则返回一维数组,没有则返回false;
			return mysql_fetch_assoc($res);	
		}
		
			   /*
		*	查询多条数据
		*	@param1 string $sql
		*	@return mixed,成功则返回二维数组,失败则返回空数组
		*/
		
		protected function db_getALL($sql) {
			//执行，返回结果
			$res = $this->db_query($sql);
			//定义一个空数组，用于循环遍历保存二维数组
			$lists = array();
			while($row = mysql_fetch_assoc($res)) {
				$lists[] = $row;
			}
			//返回结果,mysql_fetch_assoc,有结果则返回一维数组,没有则返回空数组;
			return $lists;	
		}
		
	}
	
