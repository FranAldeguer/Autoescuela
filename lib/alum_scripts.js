function insertar_modificar(){

	var id      = $("#inputid").val();
    var dni     = $("#inputdni").val();
    var nom     = $("#inputnombre").val();
    var ape     = $("#inputapellidos").val();
    var fnac    = $("#inputfecha_nac").val();
    var telf    = $("#inputtelefono").val();
    var mail    = $("#inputmail").val();
    var id_prof = document.forms['forminsertar']['selectid_profesor'].value;   
    var id_comporobacion = id;
    var clasetr = $('#clasebarra').val();
    
   
	if(nom == ''){
		alert("El alumno debe llevar un nombre");
		$('#inputnombre').focus();
	    return
	}
	if(isNaN($("#inputtelefono").val())){
		alert("El campo de telefono solo admite numeros");
	    return
	}
	if(mail == ''){
		alert("El email no puede estar vacio");
		$('#inputmail').focus();
		return
	}
	
	$.post(
        'http://localhost/Autoescuela/controles/Control_alumnos.php',
        {
            inputid           : id,
            inputdni          : dni,
            inputnombre       : nom,
            inputapellidos    : ape,
            inputfecha_nac    : fnac,
            inputtelefono     : telf,
            inputmail         : mail,
            selectid_profesor : id_prof
        },
        function(data){
        	if(data==false){
        		alert("ERROR");
        		return;
        	}
            if(fnac == ""){fnac = '0000-00-00';}
            if(telf == ""){telf = 0;}
            if(id_comporobacion == 0){
            	alert(data);
                alert("Insertado correctamente");
                var lista = "";
                lista += '<tr id='+data+' clase="cebra_'+clasetr+'">';
                //lista += '<td class="id">'+data+'</td>';
                lista += '<td class="dni">'+dni+'</td>';
                lista += '<td class="nombre">'+nom+'</td>';
                lista += '<td class="apellidos">'+ape+'</td>';
                lista += '<td class="fecha_nac">'+fnac+'</td>';
                lista += '<td class="telefono">'+telf+'</td>';
                lista += '<td class="mail">'+mail+'</td>';
                lista += '<td class="id_prof">'+id_prof+'</td>';
                lista += "<td align='center'><img src='img/borrar.png' onclick='borrar("+data+", \""+nom+"\", this)' height='25px' width='25px'></td>";
                lista += "<td align='center'><img src='img/modificar.png' onclick='cargardatos("+data+")' height='25px' width='25px'></td>";
                lista += '</tr>';
                $('#listadotabla').append(lista);
                recargarTabla();
                cancelar();
            }
            else{
                $('#'+id+' td.dni').each(function() {
                    $(this).text($("#inputdni").val());
                });
                $('#'+id+' td.nombre').each(function() {
                    $(this).text($("#inputnombre").val());
                });
                $('#'+id+' td.apellidos').each(function() {
                    $(this).text($("#inputapellidos").val());
                });
                $('#'+id+' td.fecha_nac').each(function() {
                    $(this).text($("#inputfecha_nac").val());
                });
                $('#'+id+' td.telefono').each(function() {
                    $(this).text($("#inputtelefono").val());
                });
                $('#'+id+' td.mail').each(function() {
                    $(this).text($("#inputmail").val());
                });
                $('#'+id+' td.id_prof').each(function() {
                    $(this).text(document.forms['forminsertar']['selectid_profesor'].value);
                });
                cancelar();
            }
        }
    );
    
}

//Funcion para borrar un alumno
function borrar(id, nombre, td){
    ventana=confirm("Eliminar -> Nombre: "+nombre+" id: "+id);
    if (ventana) {
        $.post(
            'http://localhost/Autoescuela/controles/Control_alumnos.php',
            {
                funcion: "borrar_registro",
                id_borrar: id
            },
            function (data){});
            removeTR(td);

    }
    else {
        alert("No se ha eliminado el alumno");            
    }      
}

//Funcion para cargar los values de los input para modificar un alumno
function cargardatos(id){
    //$('#'+id+' td.id').each(function() {
        //var id = $(this).text();
        $("#inputid").val(id);
    //});
    $('#'+id+' td.dni').each(function() {
        var dni = $(this).text();
        $("#inputdni").val(dni);
    });
    $('#'+id+' td.nombre').each(function() {
        var nombre = $(this).text();
        $("#inputnombre").val(nombre);
    });
    $('#'+id+' td.apellidos').each(function() {
        var apellidos = $(this).text();
        $("#inputapellidos").val(apellidos);
    });
    $('#'+id+' td.fecha_nac').each(function() {
        var fecha_nac = $(this).text();
        $("#inputfecha_nac").val(fecha_nac);
    });
    $('#'+id+' td.telefono').each(function() {
        var telefono = $(this).text();
        $("#inputtelefono").val(telefono);
    });
    $('#'+id+' td.mail').each(function() {
        var mail = $(this).text();
        $("#inputmail").val(mail);
    });
    $('#'+id+' td.id_prof').each(function() {
        var id_prof = $(this).text();
        document.forms['forminsertar']['selectid_profesor'].value = id_prof;
    });
    document.getElementById("btninsert").innerHTML="Modificar";
    //$("#nuevoAlumno").val("modificar");
}

function cancelar(){   
    $("#inputid").val(0);
    $('#forminsertar').each (function(){
        this.reset();
    });
    document.getElementById("btninsert").innerHTML="Insertar";
}

//Funcion para borrar una fila de una tabla
function removeTR(td){
    $(td).parents("tr").remove();
    recargarTabla();
}

function recargarTabla(){
	var i =1;
    var tabla = $('#listadotabla');
    tabla.find("tr").each(function() {
        var tr = $(this);
        tr.removeClass('cebra_0 cebra_1').addClass('cebra_'+i);
        i++;
        if(i==2) i=0;
    });
}