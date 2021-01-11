
$(document).ready(function(){
	// se manda llamar en cuanto carga la página
	//obtener_formulario();
var id=0;
    
    $("#registros option:selected" ).text();
    $('#registros').on('change', function() {
      parametros = this.value.split(",");
      id = parametros[0];
        Llena( parametros );
      
    })

    // accion de registro (web service)
	$("#btnGuardado").click(function() {
		registrar_formulario();
	});

	// accion de edición (web service)
	$("#btnModificar").click(function() {
        var parametros = this.value.split(",");
		actualiza_formulario(id);
    });
    
    $("#btnBorrar").click(function() {
		$("#formulario").attr('hidden', true);
		$("#btn_guardar").attr('hidden', true);
		eliminar_formulario(id);
    });
    
    
    
});

function Llena(para){
    
    //alert ("El id es "+id);
    $("#txtNombre").val(para[1]);
    $("#txtApellido1").val(para[2]);
    $("#txtApellido2").val(para[3]);
    $("#cbox").val(para[4]);
    $("#txtEdad").val(para[5]);
    $("#txtEstado").val(para[6]);
    $("#txtCurp").val(para[7]);
    $("#txtNivel").val(para[8]);
    $("#txtGrado").val(para[9]);
}

/* LIMPIAR EL FORMULARIO */
function limpiar_formulario() {
	
}
function recargar(){
    location.reload();
}
function obtener_formulario() {
	// COMPLETAR - CONFIGURAR LA SOLICITUD AJAX
	$.ajax({
        url: '/practicaspPHP/proyectoIndividual2/alumnos.php', // Dónde está mi web service
        type: "GET", // MÉTODO DE ACCESO
        dataType: "JSON", // FORMATO DE LOS DATOS
        success: function (data) {
        	// COMPLETAR - VERIFICAR QUE EXISTAN LOS PRODUCTOS
            if (data.solicitud) {
            	// COMPLETAR - LOS DATOS EN LA TABLA
                mostrar_formularios(data.solicitud);
            } else {
                alert("No se obtuvieron datos");
            	$("#tbl_body").html("<tr><td colspan='6' class='text-center'>No se encontraron formularios</td></tr>");
            }
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function mostrar_formularios(solicitud) {
	let html = '';
	for (let index in solicitud) {
		html += "<tr class='text-center'>" +
				"<td>"+solicitud[index].id+"</td>" +
                "<td>"+solicitud[index].fecha+"</td>" +
                "<td>"+solicitud[index].nombres+"</td>" +
				"<td>"+solicitud[index].apellidoP+"</td>" +
				"<td>"+solicitud[index].apellidoM+"</td>" +
				"<td>"+solicitud[index].sexo+"</td>" +
				"<td>"+solicitud[index].edad+"</td>" +
				"<td>"+solicitud[index].edo_civil+"</td>" +
                "<td>"+solicitud[index].curp+"</td>" +
                "<td>"+solicitud[index].nivel+"</td>" +
                "<td>"+solicitud[index].grado+"</td>" +
				"<td><button type=\"button\" class=\"btn btn-sm btn-warning\" onclick=\"cargar_formulario('"+solicitud[index].id+"')\">Editar</button>" +
				"<button type=\"button\" class=\"btn btn-sm btn-danger\" onclick=\"eliminar_formulario('"+solicitud[index].id+"')\">Eliminar</button></td>" +
			"</tr>";
	}

	$("#tbl_body").html(html);
}

function registrar_formulario() {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_producto = {
    	
        nombres: $("#txtNombre").val(),
        apellido1: $("#txtApellido1").val(),
        apellido2: $("#txtApellido2").val(),
        sexo: $("#cbox").val(),
        edad: $("#txtEdad").val(),
        estado_civil: $("#txtEstado").val(),
        curp: $("#txtCurp").val(),
        nivel: $("#txtNivel").val(),
        grado: $("#txtGrado").val()
        
    };
        //alert(json_producto);
	$.ajax({
        url: '/practicaspPHP/proyectoIndividual2/alumnos.php',
        type: "POST",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_producto), // CONVERTIR EN STRING JSON
        success: function (data) {
        	// COMPLETAR - PROCESAR RESPUESTA
            alert(data.mensaje);

            // cargar de nuevo la página
            location.reload();
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function cargar_formulario(id) {
	$("#formulario").attr('hidden', false);
	$("#btn_guardar").attr('hidden', true);
	$("#btn_editar").attr('hidden', false);

	$.ajax({
        url: '/practicaspPHP/proyectoIndividual2/alumnos.php',
        type: "GET",
        // COMPLETAR - ENVIAR EL FOLIO
        data: {
            id: id
        },
        success: function (data) {
        	// COMPLETAR - VERIFICAR QUE EXISTA EL PRODUCTO
            if (data.solicitud) {
            	let solicitud = data.solicitud;
                // COMPLETAR - CARGAR LOS DATOS EN EL FORMULARIO
                $("#id").val(solicitud.id);
                $("#fecha").val(solicitud.fecha);
                $("#nombres").val(solicitud.nombres);
                $("#apellidoP").val(solicitud.apellidoP);
                $("#apellidoM").val(solicitud.apellidoM);
                $("#sexo").val(solicitud.sexo);
                $("#edad").val(solicitud.edad);
                $("#edo_civil").val(solicitud.edo_civil);
                $("#curp").val(solicitud.curp);
                $("#nivel").val(solicitud.nivel);
                $("#grado").val(solicitud.grado);
            } else {
            	alert('No se encontró la solicitud');
            }
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error! " + status);
            console.log(xhr);
        }
    });
}

function actualiza_formulario(id) {
	// COMPLETAR - DEFINIR EL JSON A ENVIAR CON LOS DATOS DEL PRODUCTO
	let json_formulario = {
        id: (id),
        nombres: $("#txtNombre").val(),
        apellido1: $("#txtApellido1").val(),
        apellido2: $("#txtApellido2").val(),
        sexo: $("#cbox").val(),
        edad: $("#txtEdad").val(),
        estado_civil: $("#txtEstado").val(),
        curp: $("#txtCurp").val(),
        nivel: $("#txtNivel").val(),
        grado: $("#txtGrado").val()
    };
    //alert(JSON.stringify(json_formulario));
	$.ajax({
        url: '/practicaspPHP/proyectoIndividual2/alumnos.php',
        type: "PUT",
        // COMPLETAR - ENVIAR EL JSON DEL PRODUCTO
        data: JSON.stringify(json_formulario), // CONVERTIR EN STRING JSON
        success: function (data) {
        	// COMPLETAR - PROCESAR RESPUESTA
            alert(data.mensaje);
            location.reload();
        },
        error: function (xhr, status) {
            location.reload();
            console.log(xhr);
        }
    });
}

function eliminar_formulario(id) {
	if (confirm('¿Está seguro de eliminar el producto con id: ' + id + '?')) {
		$.ajax({
			// COMPLETAR - ENVIAR EL FOLIO EN LA URL
	        url: '/practicaspPHP/proyectoIndividual2/alumnos.php?id=' + id,
	        type: "DELETE",
	        success: function (data) {
	        	// COMPLETAR - PROCESAR RESPUESTA
                alert(data.mensaje);

                location.reload();
	            
	        },
	        error: function (xhr, status) {
	            alert("Ha ocurrido un error! " + status);
	            console.log(xhr);
	        }
	    });
	} else {
		return false;
	}
}