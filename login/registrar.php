<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="shortcut icon" href="./sources/favicon.png" type="image/x-icon">
    <title>Registro</title>
</head>
<body>
    <div class="circle"></div>
    <h2>Crea tu cuenta</h2>
    <form action="../includes/altausuarios.php" method="post" class="form">
        <input type="email" name="mail" id="mail" placeholder="Email" required>
        <input type="password" name="pwd" id="pwd" placeholder="Contraseña" required>
        <button type="submit">Crear cuenta</button>
    </form>
    <footer>
        Ya tienes tu cuenta, inicia sesión
        <a href="../index.php">Aquí</a>
    </footer>
</body>
</html>
