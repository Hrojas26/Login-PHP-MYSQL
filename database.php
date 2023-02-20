<!-- CONEXIÓN A BASE DE DATOS -->
<?php  
$server ='localhost';
$username = 'root';
$password = '';
$database = 'bd_login_hkc';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
} catch (PDOException $e) {
    die('Conexion fallida: '.$e->getMessage());

}

?>