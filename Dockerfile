FROM centos:7

# Install Apache
RUN yum -y update
RUN yum -y install httpd httpd-tools

# Install EPEL Repo
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
 && rpm -Uvh http://rpms.remirepo.net/enterprise/remi-release-7.rpm


# Install PHP
RUN yum --enablerepo=remi-php81 -y install php php-bcmath php-cli php-common php-gd php-intl php-ldap php-mbstring \
    php-mysqlnd php-pear php-soap php-xml php-xmlrpc php-zip php-devel libtoll-ltdl-devel
    
# php-devel, libtoll-ltdl-devel: mssql

# Update Apache Configuration
RUN sed -E -i -e '/<Directory "\/var\/www\/html">/,/<\/Directory>/s/AllowOverride None/AllowOverride All/' /etc/httpd/conf/httpd.conf
RUN sed -E -i -e 's/DirectoryIndex (.*)$/DirectoryIndex index.php \1/g' /etc/httpd/conf/httpd.conf

EXPOSE 80

# Start Apache
CMD ["/usr/sbin/httpd","-D","FOREGROUND"]

# RUN curl https://packages.microsoft.com/config/rhel/7/prod.repo > /etc/yum.repos.d/mssql-release.repo
# RUN yum remove unixODBC-utf16 unixODBC-utf16-devel
# RUN ACCEPT_EULA=Y yum install -y msodbcsql18
# RUN ACCEPT_EULA=Y yum install -y mssql-tools18
# RUN echo 'export PATH="$PATH:/opt/mssql-tools18/bin"' >> ~/.bashrc
# RUN source ~/.bashrc
# RUN yum install -y unixODBC unixODBC-devel

# RUN pecl install sqlsrv
# RUN pecl install pdo_sqlsrv