<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="css/estilos2.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    <h1 class="titulo">Iniciar Sesion</h1>
    <hr class="border">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login" class="formulario">
        <div class="form-group">
            <input type="text" name="usuario" class="input" placeholder="Usuario">
            <br>
            <input type="password" name="password"  class="input" placeholder="Contraseña">
            <br>
            <button name="envio" class="envio" onClick="login.submit()">Envio</button>
        </div>
        <?php if(!empty($errores)): ?>
            <div class="error">
                <ul>
                    <?php echo $errores; ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>
    <p class="texto-registrate">
        ¿Aun no tienes cuenta?
        <br>
        <a href="registrate.php">Registrarse</a>
    </p>
</body>
</html>