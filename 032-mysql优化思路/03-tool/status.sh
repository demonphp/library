#!/bin/bash
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

while true
do
    mysql -uroot -e 'show processlist \G' | grep State|uniq -rn >>proce.txt
	usleep 100000
done
