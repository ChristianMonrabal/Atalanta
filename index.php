<?php
// Incluye el archivo de conexión a la base de datos
include_once './includes/conexion.php';

// Variable para almacenar el mensaje de error
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $correo = $_POST['mail'];
    $contrasena = $_POST['pwd'];

    // Consulta SQL para buscar el correo en la base de datos
    $consulta = "SELECT correo, contrasena FROM Usuarios WHERE correo = ?";
    
    $stmt = $mysqli->prepare($consulta);

    if ($stmt) {
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->bind_result($dbCorreo, $dbContrasena);

        if ($stmt->fetch()) {
            // Verifica si la contraseña proporcionada coincide con la contraseña en la base de datos
            if (password_verify($contrasena, $dbContrasena)) {
                // Contraseña válida, permite el acceso y redirige a "../index.php"
                header('Location: ./views/view1.php');
                exit();
            } else {
                $mensaje = "La contraseña es incorrecta.";
            }
        } else {
            $mensaje = "La cuenta no existe.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-pleidebar="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/styles.css">
    <title>Login</title>
    <link rel="shortcut icon" href="./sources/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="circle"></div>
    <h1>Bienvenido a Atalanta</h1>
    <h2>Accede a tu cuenta</h2>
    <form action="" method="post" class="form">
        <input type="email" name="mail" placeholder="Email" required>
        <input type="password" name="pwd" placeholder="Contraseña" required>
        <button type="submit">Acceder</button>
    </form>
    <div><?php echo $mensaje; ?></div>
    <footer>
        No tienes cuenta, regístrate
        <a href="./login/registrar.php">Aquí</a>
    </footer>
</body>
</html>
