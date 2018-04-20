# mkweb是mkserver的配置前端，用于配置mock接口

#运行目录
/var/www/html

#设置mkserver地址
vi mkweb/application/config/config.php

#安装
yum install httpd
yum install php php-devel

#更新项目httpd.conf

service httpd start

