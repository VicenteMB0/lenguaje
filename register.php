<!-- Codigo que maneja el registro de un nuevo usuario  -->
<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['regName'];
    $email = $_POST['regEmail'];
    $contrasenia = $_POST['regPassword'];
    
    // Asegúrate de proteger la contraseña antes de almacenarla
    // store procedure -> componentes que almacenan consultas almacenadas, precompiladas o un archivo json
    $hashed_password = password_hash($contrasenia, PASSWORD_BCRYPT);
    
    try {
        // Inserción del usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, email, contrasenia) VALUES (:nombre, :email, :contrasenia)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contrasenia', $hashed_password);
        $stmt->execute();
        
        header("Location: modulos.html");
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Método no permitido';
}
?>
