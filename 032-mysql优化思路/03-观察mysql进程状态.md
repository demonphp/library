#sysbench

sysbench oltp_read_write.lua \
--mysql-table-engine=innodb \
--mysql-user=root \
--db-driver=mysql \
--mysql-db=test \
--oltp-table-name=t_company  \
--oltp-table-size=3000 \
--mysql-socket=/tmp/mysql.sock prepare


--mysql

show variables like 'profiling';