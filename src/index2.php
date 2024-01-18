<?php
phpinfo();

$server_name = "your server name";
$database_name = "your database name";
try
 {
  $conn = new PDO("sqlsrv:Server=$server_name;Database=$database_name;ConnectionPooling=0", "user_name", "password");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'thanh cong';

}
catch(PDOException $e)
{
   echo $e->getMessage();

}

// /usr/local/etc/php/conf.d#
// Warning: PHP Startup: Unable to load dynamic library 'pdo.so' 
// (tried: /usr/local/lib/php/extensions/no-debug-non-zts-20210902/pdo.so 
// (/usr/local/lib/php/extensions/no-debug-non-zts-20210902/pdo.so: cannot open shared object file: No such file or directory), 
// /usr/local/lib/php/extensions/no-debug-non-zts-20210902/pdo.so.so (/usr/local/lib/php/extensions/no-debug-non-zts-20210902/pdo.so.so: 
// cannot open shared object file: No such file or directory)) in Unknown on line 0