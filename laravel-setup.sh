#install apache
sudo yum -y install httpd
sudo systemctl start httpd
sudo systemctl enable httpd

#install mysql 5.7
sudo yum -y remove mariadb-libs.x86_64
sudo yum -y install http://dev.mysql.com/get/mysql57-community-release-el7-8.noarch.rpm
sudo yum -y install mysql-community-server
sudo systemctl start mysqld
sudo systemctl enable mysqld

#install php7.4
sudo yum -y install epel-release
sudo rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
sudo yum -y install --enablerepo=remi,remi-php74 php php-devel php-mbstring php-pdo php-gd php-xml php-mcrypt

#install composer 
sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

#install unzip
sudo yum -y install unzip
