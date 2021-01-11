<html>
    <head>
        <title>Contador</title>
        <meta http-equiv="content-type" content="text/html; charset=iso8859-1">
    </head>
    <body>
        <h1>Contador</h1>
        <p>Cantidad de visitas
            <b>
                <?php
                    $fp = fopen("counter.txt", "r+");
                    $counter = fgets($fp,7);
                    echo $counter;
                    $counter++;
                    rewind($fp);
                    fputs($fp, $counter);
                    fclose($fp);
                ?>
            </b>   
        </p>
</html>