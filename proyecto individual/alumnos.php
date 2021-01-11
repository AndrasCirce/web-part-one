<?php
   require_once("bd.php"); 

   if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
		if(isset($_GET['id'])) {
			// buscar producto
			$id = $_GET['id'];

			
			$solicitud = ConsultarMono($id);

			// responder la solicitud
			if ($solicitud != null) { // si se encontró el producto
			
				header('Content-Type: application/json');
				$respuesta = [
					"solicitud" => (object)[
						"id" => $solicitud->id,
						"nombres" => $solicitud->nombres,
						"apellido1" => $solicitud->apellido1,
						"apellido2" => $solicitud->apellido2,
						"sexo" => $solicitud->sexo,
						"edad" => $solicitud->edad,
                        "estado_civil" => $solicitud->estado_civil,
                        "curp" => $solicitud->curp,
                        "nivel" => $solicitud->nivel,
						"grado" => $solicitud->grado
						
					]
				];

				// enviando respuesta
				echo json_encode($respuesta);
			} else {
				// no lo encontró
				header('Content-Type: application/json');
				$respuesta = [
					"solicitud" => (object)[]
				];

				// enviando respuesta
				echo json_encode($respuesta);
			}

		} else {
			// web service 2. Consultar todo

			// obteniendo todos los productos de la base de datos
			$solicitud = ConsultarTodo();

			if (is_array($solicitud) && sizeof($solicitud) > 0) { // sí tiene elementos (productos)
				// sí hay elementos
				header ('Content-Type: application/json'); // la respuesta es en JSON

				$array_solicitud = [];
				// obtener todos los productos del resultado de la base de datos
				foreach($solicitud as $item) { 
					$array_solicitud[] = $item; // agrego cada producto al arrglo de productos
				}

				$respuesta = [
					"mensaje" => "Proceso exitoso",
					"solicitud" => $array_solicitud
				];

				echo json_encode($respuesta);
			} else {
				// no hay elementos
				header ('Content-Type: application/json'); // la respuesta es en JSON
				$respuesta = [
					"mensaje" => "Proceso exitoso",
					"solicitud" => []
				];

				echo json_encode($respuesta);
			}

		}
   }
   else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // contenido de proceso POST

		// Paso 1. Obtener valores de la solicitud
		$datos_recibidos = json_decode(
			file_get_contents("php://input")
		);
        
		$nombres = $datos_recibidos->nombres;
		$apellido1 = $datos_recibidos->apellido1;
		$apellido2 = $datos_recibidos->apellido2;
		$sexo = $datos_recibidos->sexo;
		$edad = $datos_recibidos->edad;
        $estado_civil = $datos_recibidos->estado_civil;
        $curp = $datos_recibidos->curp;
        $nivel = $datos_recibidos->nivel;
        $grado = $datos_recibidos->grado;

		// registrar en la base de datos
		$resultado = Insertar( $nombres, $apellido1, $apellido2, $sexo, $edad, $estado_civil, $curp, $nivel, $grado);

		if ($resultado != null) { 
			# Sí se realizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "Registro exitoso"
			];

			echo json_encode($respuesta);
		} else {
			// no se realizó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "No se pudo registar"
			];

			echo json_encode($respuesta);
		}
   }
   else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    error_log(file_get_contents("php://input"));
    // contenido de proceso PUT
    $datos_recibidos = json_decode(
        file_get_contents("php://input")
    );

    $id = $datos_recibidos->id;
    $nombres = $datos_recibidos->nombres;
    $apellido1 = $datos_recibidos->apellido1;
    $apellido2 = $datos_recibidos->apellido2;
    $sexo = $datos_recibidos->sexo;
    $edad = $datos_recibidos->edad;
    $estado_civil = $datos_recibidos->estado_civil;
    $curp = $datos_recibidos->curp;
    $nivel = $datos_recibidos->nivel;
    $grado = $datos_recibidos->grado;
    // procesar algoritmo
    $resultado = Actualizar($id, $nombres, $apellido1, $apellido2, $sexo, $edad, $estado_civil, $curp, $nivel, $grado);
    
    if ($resultado !=null ) {
        # sí se actualizó
        header ('Content-Type: application/json'); // la respuesta es en JSON

        $respuesta = [
            "mensaje" => "Actualización correcta"
        ];

        echo json_encode($respuesta);
    } else {
        // no se actualizó
        header ('Content-Type: application/json'); // la respuesta es en JSON

        $respuesta = [
            "mensaje" => "No se pudo actualizar"
        ];

        echo json_encode($respuesta);
    }
   }
   else if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        // contenido de proceso DELETE
		$id = $_GET['id'];

		$resultado = Borrar($id);

		if ($resultado != null) {
			# Sí se eliminó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "Eliminación correcta" // agregar a la cadena
			];

			echo json_encode($respuesta);
		} else {
			// no se eliminó
			header ('Content-Type: application/json'); // la respuesta es en JSON

			$respuesta = [
				"mensaje" => "No se pudo eliminar" // agregar a la cadena
			];

			echo json_encode($respuesta);
		}
	} else {
		// procesar error y responder
	}
   
?>