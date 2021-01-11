<?php
    new mysqli('localhost', 'root', '', 'php_web');
    echo $connection->connect_errno;
?>