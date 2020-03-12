<?php
require  '../lib/medoo/medoo.php';
 
$database = new medoo([
// required
'database_type' => 'mysql',
'database_name' => 'mesural',
'server' => '127.0.0.1',
'username' => 'root',
'password' => 'root',
'charset' => 'utf8',
'port' => '3307'
]);
?>