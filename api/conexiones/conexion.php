<?php
require  'lib/medoo/medoo.php';
 
$database = new medoo([
// required
'database_type' => 'mysql',
'database_name' => 'cuantiemesural',
'server' => 'cuantiemesural.mysql.db',
'username' => 'cuantiemesural',
'password' => 'Meencha22',
'charset' => 'utf8',
'port' => '3306'
]);
?>