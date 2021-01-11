<?php
    setcookie("check",1);
    if(isset($_POST['submit'])){
        setcookie("voted",1);
    }
?>

<html>
    <head>
        <title>Encuesta de opciones</title>
        <meta http-equiv="content-type" content="text/html; charset-iso-8859-1">
    </head>
    <body>
        <h1>Encuesta</h1>
        <h3>Que opinas de los nuevos costos del transporte publico en Leon</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="radio" name="reply" value="0">
            Me parece un precio justo por la calidad de servicio que ofrece. <br>
            <input type="radio" name="reply" value="1">
            Me da igul siempre voy en coche. <br>
            <input type="radio" name="reply" value="2">
            Me parece excesivamente caro. <br>
            <br><br>
            <?php
                if(empty($_POST['submit']) && empty($_COOKIE['voted'])) {
            ?>
            <input type="submit" name="submit" value="Vota">
            <?php
                } else {
                    echo "<p>Gracias por tu voto</p>\n";
                    if(isset($_POST['reply']) && isset($_COOKIE['check']) && empty($_COOKIE['voted'])){
                        $file = "results.txt";
                        $fp = fopen($file, "r+");
                        $vote = fread($fp, filesize($file));
                        $arr_vote = explode(",",$vote);
                        $reply = $_POST['reply'];
                        $arr_vote[$reply]++;
                        $vote = implode(",", $arr_vote);
                        rewind($fp);
                        fputs($fp, $vote);
                        fclose($fp);
                    }
                }
            ?>
        </form>
        <p>[<a href="results.php" target="_blank">Ver resultados de encuesta</a>] </p>
    </body>
</html>