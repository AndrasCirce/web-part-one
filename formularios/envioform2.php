<!DOCTYPE html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=iso8859-1">
        <title>Formailer</title>
    </head>
    <body>
            <?php
                $receiverMail = "16240370@leon.tecnm.mx";
                $subject = "...";
                $message = "Datos enviados:\n\n";
                foreach($_POST as $name => $value){
                    $message .= "$name: $value\n";
                }

                if(isset($_POST['Mail']) && $_POST['Mail'] != ""){
                    $poster = $_POST['Mail'];
                    if(@mail($receiverMail, $subject, $message, "From: $poster")){
                        echo "<p>Gracias por enviarme tu opinion</p>\n";
                        echo "<p>Tu mensaje fue enviado</p>\n";  
                    } else {
                        echo "<p>Lo siento tu mensaje no pudo enviarse</p>\n";  
                    }
                } else {
                    echo "<p>Por favor escribe tu direccion de correo</p>\n";  
                }
            ?>
    </body>
</html>