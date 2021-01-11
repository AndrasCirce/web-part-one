<?php 
    include("funciones.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>        
        <link rel="stylesheet" href="estilos1.css">
	    <title>Proyecto Individual</title>
        
    </head>
    <body>
    <a href="cerrar.php">Cerrar Sesion</a>
        <div align='center';>
		    <img src="gto.jpg" width="150" height="150" align=center><br>
		    <p>SOLICITUD DE BECA (formato 1)<br>
		    SUBSECRETARIA PARA EL DESARROLLO EDUCATIVO<br>
		    <b>FORMATO PARA PLANTELES PARTICULARES INCORPORADOS DE EDUCACION TIPO BASICO</b><br>
		    <b>CICLO ESCOLAR 2016-2017</p>
	    </div>

        <div class="Fecha" align='right'>
            
                <b>FECHA:</b><!--<input type="date" ="Fecha" class="txtFecha" value="<?php echo date('Y-m-d', strtotime($valor['fecha'])) ?>">--><br>
		        <b>DIA  MES AÑO<b>
            
            
	    </div><br>
	        <div  id="divEncabezado" align='center'; >DATOS DEL SOLICITANTE</div><br><br>
	        <div id="#divContenido" ; >
	        </div>
	        <div class="seccion1" >
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="formulario">
                    <input type="text" class="seccion1txt1" id="txtNombre" style="left: 400px; width: 215px">
                    <input type="text" class="seccion1txt1" id="txtApellido1" style="left: 665px; width: 215px">
                    <input type="text" class="seccion1txt1" id="txtApellido2" style="left: 925px; width: 215px">
                    <p style="top: 348px; left: 465px;">NOMBRE(S)</p>
		        	<p style="top: 348px; left: 705px;">PRIMER APELLIDO</p>
		        	<p style="top: 348px; left: 945px;">SEGUNDO APELLIDO</p> 
		        	
                    <select id="cbox" class="seccion1txt2" style="left: 440px;">
                        <option value="F">F</option>
                        <option value="M">M</option>
                    </select>
                    <!--<input type="text" class="seccion1txt2" id="cbox" style="left: 430px; width: 50px">-->
                    
                    <input type="text" class="seccion1txt2" id="txtEdad" style="left: 540px; width: 60px">
                    <!--<input type="text" class="seccion1txt2" id="txtEstado" style="left: 660px; width: 115px">-->
                    <select  class="seccion1txt2" id="txtEstado" style="left: 660px; width: 115px">
                        <option value="soltero/a">soltero/a</option>
                        <option value="casado/a">casado/a</option>
                        <option value="viuda/a">viudo/a</option>
                    </select>

                    <input type="text" class="seccion1txt2" id="txtCurp" style="left: 790px; width: 185px">
                    <select class="seccion1txt2" id="txtNivel" style="left: 1005px; width: 60px">
                        <option value="Prim">Primaria</option>
                        <option value="Secu">Secundaria</option>
                        <option value="Prep">Preparatoria</option>
                    </select>
                    <!--<input type="text" class="seccion1txt2" id="txtNivel" style="left: 1005px; width: 60px">-->
                    <input type="text" class="seccion1txt2" id="txtGrado" style="left: 1098px; width: 60px">
		        
	        		<p style="left: 430px;">SEXO</p>
	        		<p style="left: 545px;">EDAD</p>
	        		<p style="left: 660px;">ESTADO CIVIL</p>
	        		<p style="left: 860px;">CURP</p>
	        		<p style="left: 1010px;">NIVEL</p>
                    <p style="left: 1100px;">GRADO</p>
                
	    </div>
        <div class="btn" align='center'>
        <button id="btnModificar"  class="btn" style="left: 290px" >Modificar</button>
        <button id="btnGuardado"  class="btn" style="left: 370px" onClick="prueba()">Guardar</button>
        <button id="btnBorrar"  class="btn" style="left: 445px" >Eliminar</button>
        </div>
        <div  class="catalogo">
            <p>Alumnos Registrados</p>
            <select id="registros" >
            <option value="0">Elige un Registro</option>
                <?php 
                    //include("conexion.php");
                    if ($resultado->num_rows){
                        while($fila = $resultado->fetch_assoc()){
                            echo "<option value=".$fila['id'].",".$fila['nombres'].",".$fila['apellido1'].",".$fila['apellido2'].",".$fila['sexo'].",".$fila['edad'].",".$fila['estado_civil'].",".$fila['curp'].",".$fila['nivel'].",".$fila['grado']
                            .">".$fila['nombres']." ".$fila['apellido1']." ".$fila['nivel']."</option>";
                        }
                    } else {
                        echo "No hay datos";
                    }
                ?>
            </select>
        </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	    <script src="eventos.js"></script>
        
    </body>
    
</html>