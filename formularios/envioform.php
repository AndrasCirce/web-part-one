<html>
    <head>
        <title>Un mailer para recopilar tu opinion</title>
        <meta http-equiv="content-type" content="text/html; charset=iso8859-1">
    </head>
    <body>
        <h1>Mailer</h1>
        <p>Enviame un e-mail!</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Tu direccion de e-mail: <br>
            <input type="text" name="Mail"><br>
            Tu comentario: <br>
            <textarea name="message" cols="50" rows="5"></textarea> <br>
            <input type="submit" value="Enviar">
        </form>
        <?php
            $receiverMail = "16240370@leon.tecnm.mx";
            if (isset($_POST['Mail']) && $_POST['Mail'] != ""){
                if (mail($receiverMail, "Tienes un nuevo correo!", $_POST['message'], "From: $_POST[Mail]")) {
                    echo "<p>Gracias por enviarme tu opinion</p>\n";  
                } else {
                    echo "<p>Lo siento ocurrio un error</p>\n";
                }
            }
        ?>
    </body>
</html>

