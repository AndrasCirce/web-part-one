<?php
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','proyecto_individual');
    
    function conectar() {
        try {
            return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }

    function ConsultarTodo(){
        $connect = conectar();
	    $sql = "SELECT * FROM alumnos"; 
	    $query = $connect -> prepare($sql); 
	    $query -> execute(); 
	    $results = $query -> fetchAll(PDO::FETCH_OBJ); 
        
	    if (is_array($results)) {
	    	return $results;
	    } else {
	    	return false;
	    }
    }

    function ConsultarMono($id){
        $connect = conectar();
	    $sql = "SELECT * FROM alumnos where id = :id"; 
	    $query = $connect->prepare($sql);
	    $query->bindParam(':id', $id);
	    $query->execute();
	    $results = $query -> fetchAll(PDO::FETCH_OBJ); 

	    if (isset($results[0]) && is_array($results)) {
	    	return $results[0];
	    } else {
	    	return false;
	    }
    }
    
    function Insertar( $nombres, $apellido1, $apellido2, $sexo, $edad, $estado_civil, $curp, $nivel, $grado){
        $connect = conectar();
        $sql="INSERT INTO alumnos (nombres,apellido1,apellido2,sexo,edad,estado_civil,curp,nivel,grado)
        VALUES ('$nombres','$apellido1','$apellido2','$sexo','$edad','$estado_civil','$curp','$nivel','$grado')";
        $sql = $connect->prepare($sql);
        $sql->execute();
        $id_insertado = $connect->lastInsertId();
        $connect = null;  
        return ($id_insertado) ? true : false;
    }

    function Actualizar($id, $nombres, $apellido1, $apellido2, $sexo, $edad, $estado_civil, $curp, $nivel, $grado){
        $connect = conectar();
   
    $sql="Update alumnos SET id='$id' nombres = '$nombres', apellido1 = '$apellido1', 
    apellido2 = '$apellido2', sexo = '$sexo', edad = '$edad', estado_civil = '$estado_civil', curp = '$curp',
    nivel = '$nivel', grado = '$grado' where id = '$id'";

    echo $sql;
    $sql = $connect->prepare($sql);
	$sql->execute();
	$connect = null;
	return ($sql->rowCount() > 0) ? true : false;
    }

    function Borrar ($id){
        $connect = conectar();
	    $sql="delete from alumnos where id = :id";
	    $sql = $connect->prepare($sql);
	    $sql->bindParam(':id', $id);
	    $sql->execute();
	    $connect = null;
	    return ($sql->rowCount() > 0) ? true : false;
    }

?>