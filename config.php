<!-- Este codigo sirve para realizar la conexion a la base de datos  -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ensenai";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
