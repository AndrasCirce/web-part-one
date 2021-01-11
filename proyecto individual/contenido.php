<?php session_start();
    
    if(isset($_SESSION['usuario'])){
        require 'views/contenido.view.php';
    } else {
        header ('Location: login.php');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['usuario'];
    }
?>