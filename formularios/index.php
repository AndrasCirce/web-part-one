<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Rellena los campos (form.html)</h1>
    <form action="analisis.php" method="post">
        <input type="radio" name="gender" value="0" > Sr.
        <input type="radio" name="gender" value="1" > Sra.
        Tu nombre:
        <input type="text" name="firstName">
        <input type="submit" >
    </form>
</body>
</html>-->



<html>
    <body>
        <h1>Todo en una pagina</h1>
        <form action="index.php" method="post">
            <input type="radio" name="gender" value="0" > Sr.
            <input type="radio" name="gender" value="1" > Sra.
            Tu nombre:
            <input type="text" name="firstName" value="<?php
                if(isset($_POST['firstName'])){
                    $name = $_POST['firstName'];
                    $name = htmlspecialchars($name);
                    $name = stripslashes($name);
                    echo $name;
                }
            ?>">
            <br>Tu comentario:<br>
            <textarea name="comment" cols="60" rows="4">
                <?php
                    if(isset($_POST['comment'])){
                        $comment = $_POST['comment'];
                        $comment = htmlspecialchars($comment);
                        $comment = stripslashes($comment);
                        echo $comment;
                    }   
                ?>
            </textarea>
            <input type="submit" name="submitbutton" value="Envialo!">
        </form>
        <p>
            <?php
                if(isset($_POST['gender']) && isset($_POST['firstName']) && $_POST['firstName'] != "") {
                    if($_POST['gender'] == 0){
                            echo "Hola Sr. ";
                        } else {
                            echo "Hola Sra. ";
                        }
                        echo "<b>$name</b>, encantado de saludarte";

                        echo "<br>Dijiste:<br>\n";
                        $comment = nl2br($comment);
                        echo $comment;
                    } else {
                        if(isset($_POST['submitbutton'])){
                            echo "Llena todos los campos";
                        }
                        
                    }
            ?>
        </p>
    </body>
</html>
