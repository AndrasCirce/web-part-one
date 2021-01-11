<?php
    if(isset($_POST['gender']) && isset($_POST['firstName']) && $_POST['firstName'] != "") {
    if($_POST['gender'] == 0){
            echo "Hola Sr. ";
        } else {
            echo "Hola Sra. ";
        }
        echo "<b>{$_POST['firstName']}</b>, 
            encantado de saludarte";
    } else {
        echo "Llena todos los campos";
    }
?>