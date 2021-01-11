<?php
    if(isset($_POST['pw'])){
        $pw = $_POST['pw'];
        if($pw == "U4x7z"){
            echo $pw;
            header("Location: newpage1.html");
        } elseif ($pw == "R12Tu"){
            echo $pw;
            header("Location: newpage2.html");
        } else {
            header("Location: sorry.html");
        }
    }
    
?>
<html>
    <head>Redireccion</head>
    <body>
        <h1>Redireccion</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="pw">
            <input type="submit" value="Envialo">
        </form>
    </body>
</html>