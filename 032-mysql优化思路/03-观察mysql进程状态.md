#sysbench

sysbench /usr/share/sysbench/oltp_read_write.lua \
--mysql-table-engine=innodb \
--mysql-user=root \
--db-driver=mysql \
--mysql-db=test \
--oltp-table-name=t_company  \
--oltp-table-size=3000 \
--mysql-socket=/tmp/mysql.sock prepare

--mysql

show variables like 'profiling';


sysbench /usr/share/sysbench/oltp_read_write.lua \
--mysql-host=127.0.0.1 \
--mysql-port=3306 \
--mysql-db=test \
--mysql-user=root \
--mysql-password=root \
--table_size=5000000 \
--tables=10 \
--threads=300 \
--time=60 \
--report-interval=10 \
prepare