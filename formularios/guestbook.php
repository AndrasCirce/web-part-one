<html>
    <head>
        <title>Libro de visitas</title>
        <meta http-equiv="content-type" content="text/html; charset-iso-8859-1">
    </head>
    <body>
        <h1>Libro de visitas avanzado</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Tu comentario: <br>
            <textarea name="comment" cols="55" rows="4"></textarea> <br>
            tu nombre: <br>
            <input type="text" name="name"> <br>
            tu e-mail: <br>
            <input type="text" name="email">
            <input type="submit" value="Publicar">
        </form>
        <?php
            $file1 = "oldip.txt";
            $file2 = "guestbook.txt";
            $ip = $_SERVER['REMOTE_ADDR'];
            echo "<p>Tu ip: $ip</p>";
            $fpl = fopen($file1,"r");
            $oldip = fgets($fpl);
            fclose($fpl);
            echo "<h3>Todos los comentarios</h3>";
            if(isset($_POST['comment']) && $_POST['name'] != "" && $_POST['email'] != "" && $ip != $oldip){
                $comment = $_POST['comment'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $fp2 = fopen($file2, "r+");
                $old = fread($fp2, filesize($file2));
                $email = "<a href=\"mailto:$email\">$email</a>";
                $dateOfEntry = date("Y-n-j");
                $comment = htmlspecialchars($comment);
                $comment = stripslashes(nl2br($comment));
                $entry = "<p><b>$name</b> ($email) dijo el dia <i>$dateOfEntry</i>:<br>$comment</p>\n";
                rewind($fp2);
                fputs($fp2, "$entry \n $old");
                fclose($fp2);
                $fpl = fopen($file1,"w+");
                fputs($fpl, $ip);
                fclose($fpl);
            }
            readfile($file2);
        ?>
    </body>
</html>