<?php
$db_enviroment = db_local;
// $db_enviroment = db_web;
$config_array  = parse_ini_file('config.ini',true);

$host = $config_array[$db_enviroment][host];
$dbname = $config_array[$db_enviroment][dbname];
$usr = $config_array[$db_enviroment][usr];
$password = $config_array[$db_enviroment][password];

$con = mysqli_connect($host, $usr, $password, $dbname);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>