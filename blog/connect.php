<?php

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

/*Database config */

$db_host  = '127.0.0.1';
$db_user  = '';
$db_pass  = 'test';
$db_database = ' ';

/*END OF CONFIG*/

$link = mysqli_connect($db_host, $db_user, $db_pass) or die('Unable to establish a DB connection');



mysqli_select_db($db_database, $link);
mysql_select_db("SET names UTF8");

echo 'here';

?>
