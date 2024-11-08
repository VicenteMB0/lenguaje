<!-- Codigo que sirve solo para probar la conexion a la base de datos -->
<?php
// Incluye el archivo de configuración
include 'config.php';

// Verificar la conexión
try {
    // Realizar una consulta simple
    $stmt = $conn->query("SELECT * FROM usuarios LIMIT 1");
    
    // Si la consulta se ejecuta sin errores
    if ($stmt) {
        echo "Conexión exitosa a la base de datos.";
    }
} catch (PDOException $e) {
    // Captura cualquier error en la conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>
