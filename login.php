<!-- Codigo que maneja el registro de un nuevo usuario  -->
<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los valores de email y contraseña desde el formulario de inicio de sesión
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para buscar al usuario en la base de datos
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Verifica si se encontró al usuario
    if ($stmt->rowCount() > 0) {
        // Obtiene los datos del usuario
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica si la contraseña coincide
        if (password_verify($password, $user['contrasenia'])) { // Si la contraseña está encriptada con `password_hash` en registro.php
            echo "Inicio de sesión exitoso. Bienvenido, " . htmlspecialchars($user['nombre']) . "!";
            // Redirige al usuario a la página principal o módulos
            header("Location: modulos.html");
            exit();
        } else {
            // Mensaje de error si la contraseña es incorrecta
            echo "Contraseña incorrecta. Por favor, intenta de nuevo.";
        }
    } else {
        // Mensaje de error si no se encuentra el email
        echo "No se encontró una cuenta con este correo electrónico.";
    }
}
?>