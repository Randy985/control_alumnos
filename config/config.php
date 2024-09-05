<?php
$host = 'localhost';
$dbname = 'control_alumnos';
$username = 'root';  // Si no tienes contraseña para MySQL
$password = '';      // Si tienes contraseña, colócala aquí

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Conexion en vivo
// $servername = "sql208.byethost6.com";  
// $username = "b6_37251644";             
// $password = "55564338";   
// $dbname = "b6_37251644_control_alumnos";  

// try {
//     $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
//     $conn = new PDO($dsn, $username, $password);
//     // Configuramos PDO para que lance excepciones en caso de error
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Error en la conexión a la base de datos: " . $e->getMessage());
// }
?>
