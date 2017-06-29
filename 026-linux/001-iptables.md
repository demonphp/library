## iptables是linux下的防火墙，同时也是服务名称。

service  iptables  status        查看防火墙状态

service  iptables  start           开启防火墙

service  iptables  stop           关闭防火墙

service  iptables  restart        重启防火墙


## 防火墙开放特定端口：

①文件/etc/sysconfig/iptables  
  
②添加：
     -A RH-Firewall-1-INPUT -m state --state NEW -m tcp -p tcp --dport 11211 -j ACCEPT
       ★数字8080代表开放8080端口，也可以改成其他的端口★
       
③重启防火墙
