#!/bin/bash
# Program:
#       This program shows "Hello World!" in your screen.
# History:
# 2005/08/23	VBird	First release
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH

while true
do
	mysqladmin ext | awk '/Queries/{printf("%d ",$4)}/Threads_cached/{printf("%d ",$4)}/Threads_connected/{printf("%d ",$4)}/Threads_created/{printf("%d ",$4)}/Threads_running/{printf("%d\n",$4)}' >> save_status.txt
	
	sleep 1
done
