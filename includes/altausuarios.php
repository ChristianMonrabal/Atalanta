<?php
// Incluye el archivo de conexión a la base de datos
include_once 'conexion.php';

// Variable para almacenar el mensaje
$mensaje = "";

// Verifica si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $correo = $_POST['mail'];
    $contrasena = $_POST['pwd'];

    // Verifica si el correo tiene el dominio "@atalanta.com" en el nombre de usuario
    if (strpos($correo, '@atalanta.com') !== false) {
        // Hash de la contraseña para almacenarla de forma segura
        $hash_contrasena = password_hash($contrasena, PASSWORD_BCRYPT);

        // Prepara la consulta SQL para insertar un nuevo usuario en la tabla "Usuarios"
        $stmt = $mysqli->prepare("INSERT INTO Usuarios (correo, contrasena) VALUES (?, ?)");

        // Verifica si la consulta se preparó correctamente
        if ($stmt) {
            // Vincula los parámetros y ejecuta la consulta
            $stmt->bind_param("ss", $correo, $hash_contrasena);
            if ($stmt->execute()) {
                // Registro exitoso. Define el mensaje
                $mensaje = "Cuenta creada correctamente. Redirigiendo a la página de inicio de sesión en 2 segundos.";
            } else {
                $mensaje = "Error al registrar el usuario.";
            }

            // Cierra la consulta preparada
            $stmt->close();
        }
    } else {
        $mensaje = "El correo no cumple con los requisitos de dominio.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Otras etiquetas meta y enlaces de estilos -->
</head>
<body>
    <!-- Otras partes de la página HTML -->

    <div><?php echo $mensaje; ?></div>
    <script>
        setTimeout(function(){
            window.location = "../login/login.php";
        }, 2000); // Espera 2 segundos antes de redirigir
    </script>
</body>
</html>
