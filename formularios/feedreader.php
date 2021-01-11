<!DOCTYPE html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Feedreader</title>
        <meta http-equiv="content-type" content="text/html; charset=iso8859-1">
    </head>
    <body>
        <h1>Lector RSS</h1>
        <?php
            //$newsfeed = "http://www.elpais.es/rss.html";
            $newsfeed = "silverstone.xml";
            //$newsfeed = "pass2.html";
            $show = "";
            if($rss = @simplexml_load_file($newsfeed)){
                foreach($rss->channel->item as $item){
                    $show .= "<h3>{$item->title}</h3>";
                    $show .= "<h3>{$item->description}</h3>";
                    $show .= "<div><a href='{$item->link}'>leer todo</a></div><hr>";
                }
                echo utf8_decode($show);
            } else {
                echo "<div>Error, no se pudo leer el archivo</div>";
            }
        ?>
    </body>
</html>