<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bd_jm';

//Credenciales Mysql
$Host = 'localhost';
$Username = 'root';
$Password = '';
$dbName = 'bd_jm';

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'bd_jm');
define('NUM_ITEMS_BY_PAGE', 3);
define('NUM_ITEMS_BY_PAGECom', 1);
 
$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);


$connexion = mysqli_connect($server,$username,$password,$database);

if(!$connexion) {
	die("No hay conexion: " .mysqli_connect_error());
}

?>