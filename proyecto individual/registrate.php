<?php session_start();

    if(isset($_SESSION['usuario'])){
        header('Location: index.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $tipo = $_POST['tipo'];

        //echo "$usuario . $password . $tipo";

        $errores = '';

         if(empty($usuario) or empty($password) or empty($tipo)){
            $errores .= "<li>Llena correctamente los campos</li>";
         } else {
             try {
                $conexion = new PDO('mysql:host=localhost;dbname=proyecto_individual', 'root','');
             } catch (PDOException $e){
                echo "Error: " . $e->getMessage();
             }

             $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
             $statement->execute(array(':usuario' => $usuario));
             $resultado = $statement->fetch();

             if ($resultado != false) {
                 $errores .= "<li>El nombre de usuario ya existe</li>";
             }
             //$password = hash('sha512', $password);

         }
         if ($errores == ''){
            $statement = $conexion -> prepare('INSERT INTO usuarios (id, usuario, password, tipo) VALUES (null, :usuario, :password, :tipo)');
            $statement->execute(array(':usuario' => $usuario, ':password' => $password, ':tipo' => $tipo));
            header('Location: login.php');
         }
    }
    require 'views/registrate.view.php';
?>