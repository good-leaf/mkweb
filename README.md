# mkweb是mkserver的前端配置界面

#运行目录
cd /var/www/html/
git clone https://github.com/good-leaf/mkweb.git

#配置mkserver地址
vi mkweb/application/config/config.php

#安装httpd
yum install httpd

#安装php
yum install php php-devel

#替换httpd.conf

service httpd start
