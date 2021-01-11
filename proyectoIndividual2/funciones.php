<?php
    /*$conexion = new mysqli('localhost', 'root', '', 'proyecto_individual');
    if ($conexion->connect_errno) {
        die("No hay conexion  a la base de datos");
    } else {
        $sql = "SELECT * FROM alumnos";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows){
            while($fila = $resultado->fetch_assoc()){
                echo "<option>".$fila['nombres']." ".$fila['apellido1']." ".$fila['nivel']."</option>";
            }
        } else {
            echo "No hay datos";
        }
    }*/
    include ("conexion.php");

    /*if (isset($_POST["btnGuardado"])) {
        if (strlen($_POST["txtNombre"]) >= 1 &&
            strlen($_POST["txtApellido1"]) >= 1 &&
            strlen($_POST["txtApellido2"]) >= 1 &&
            //strlen($_POST["sexo"]) >= 1 &&
            strlen($_POST["txtEdad"]) >= 1 &&
            strlen($_POST["txtEstado"]) >= 1 &&
            strlen($_POST["txtCurp"]) >= 1 &&
            strlen($_POST["txtNivel"]) >= 1 &&
            strlen($_POST["txtGrado"]) >= 1 ){
            
            $nombre = trim($_POST["txtNombre"]);
            $ap1 = trim($_POST["txtApellido1"]);
            $ap2 = trim($_POST["txtApellido2"]);
            //$sexo = trim($_POST["sexo"]);
            $edad = trim($_POST["txtEdad"]);
            $estado = trim($_POST["txtEstado"]);
            $curp = trim($_POST["txtCurp"]);
            $nivel = trim($_POST["txtNivel"]);
            $grado = trim($_POST["txtGrado"]);
            
            $sql = "INSERT INTO alumnos (id, nombres, apellido1, apellido2, sexo, edad, estado_civil, curp, nivel, grado) VALUES 
            (NULL, '$nombre', '$ap1', '$ap2', NULL, '$edad', '$estado', '$curp', '$nivel', '$grado')";
            $resultado = mysqli_query($connection,$sql);
            if($resultado){
                ?>
                    <h3 class="ok">Registro correcto</h3>
                <?php
            } else{
                ?>
                <h3 class="bad">Ocurrio un error</h3>
                <?php
            }
        } else {
            ?>
            <h3 class="bad">Completa los campos</h3>
            <?php
        }

    }
*/
?>