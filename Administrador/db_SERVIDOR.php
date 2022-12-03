<?php

$server = 'localhost';
$username = 'asonorte_admdeasonorte65423';
$password = '#45kOKa~WC=146dG';
$database = 'asonorte_bdatosasonorte46852';

//Credenciales Mysql
$Host = 'localhost';
$Username = 'asonorte_admdeasonorte65423';
$Password = '#45kOKa~WC=146dG';
$dbName = 'asonorte_bdatosasonorte46852';

$connexion = mysqli_connect($server,$username,$password,$database);

if(!$connexion) {
	die("No hay conexion: " .mysqli_connect_error());
}




$server = 'localhost';
$username = 'volveral_admin';
$password = 'hBHyg1cWXVWn';
$database = 'volveral_test';
//$database = 'bd_jm';

//Credenciales Mysql
$Host = 'localhost';
$Username = 'volveral_admin';
$Password = 'hBHyg1cWXVWn';
$dbName = 'volveral_test';
//$dbName = 'bd_jm';

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'volveral_admin');
//define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', 'hBHyg1cWXVWn');
define('DB_DATABASE', 'volveral_test');
//define('DB_DATABASE', 'bd_jm');
define('NUM_ITEMS_BY_PAGE', 3);
 
$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);


$connexion = mysqli_connect($server,$username,$password,$database);

if(!$connexion) {
	die("No hay conexion: " .mysqli_connect_error());
}
?>