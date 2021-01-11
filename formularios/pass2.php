<html>
    <head>
        <title>Conoces la password?</title>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    </head>
    <body>
        <h1>Conoces la password?</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="pw">
            <input type="submit" value="Envialo">
        </form>
        <?php
            if(isset($_POST['pw'])){
                $pw = $_POST['pw'];
                switch($pw){
                    
                case "U4x7z":
        ?>
                    <h3>1. Seccion protegida</h3>
                    <p>Contenido interesante...</p>
            <?php
                break;    
                case "R12Tu":
            ?>        
                    <h3>2. Seccion protegida</h3>
                    <p>Contenido interesante...</p>
            <?php
                break;
                default:
            ?>
                    <h3>Lo siento, no puedes entrar</h3>
                    <p>Parece que no sabes la password</p>
            <?php
                }
            }
            ?>    
    </body>
</html>