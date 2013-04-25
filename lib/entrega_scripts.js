function insertar_modificar(){
    var id = $("#inputid").val(); 
    var fecha = $("#inputfecha").val();
    var cant = $("#inputcantidad").val();
    var id_alu = document.forms['forminsertar']['selectid_alumno'].value;
    
    var id_comporobacion = id;
    if(isNaN(cant) || id_alu == 0 || fecha == ""){
    	if(fecha == ""){
    		alert("La entrega debe tener una fecha");
	        $('#inputfecha').focus();
    	}
    	if(id_alu == 0){
	        alert("La entrega debe pertenecer a un alumno");
	        document.forms['forminsertar']['selectid_alumno'].focus();
    	}
    	if(isNaN(cant)){
    		alert("La cantidad tiene que ser un numero");
    		$("#inputcantidad").focus();
    	}
    }else{
        $.post('http://localhost/Autoescuela/controles/Control_entregas.php', {inputid:id, inputfecha:fecha, inputcantidad:cant, selectid_alumno: id_alu},
        function(data){
            if(id_comporobacion == 0){
                $('#listadotabla').append('<tr id='+data+'>');
                    $('#'+data).append('<td class="id">'+data+'</td><td class="fecha">'+fecha+'</td><td class="cantidad">'+cant+'</td><td class="id_alumno">'+id_alu+'</td>');
                    $('#'+data).append("<td align='center'><img src='img/borrar.jpg' onclick='borrar("+data+", \""+cant+"\", this)' height='25px' width='25px'></td>");
                    $('#'+data).append("<td align='center'><img src='img/modificar.png' onclick='cargardatos("+data+")' height='25px' width='25px'></td>");
                $('#listadotabla').append('</tr>');
                cancelar();
            }
            else{
                $('#'+id+' td.dni').each(function() {
                    $(this).text($("#inputdni").val());
                });
                $('#'+id+' td.fecha').each(function() {
                    $(this).text($("#inputfecha").val());
                });
                $('#'+id+' td.cantidad').each(function() {
                    $(this).text($("#inputcantidad").val());
                });
                $('#'+id+' td.id_alumno').each(function() {
                    $(this).text(document.forms['forminsertar']['selectid_alumno'].value);
                });
                cancelar();
            }
        });
    }

}


//Funcion para borrar un alumno
function borrar(id, nombre, td){
    ventana=confirm("Eliminar -> Nombre: "+nombre+" id: "+id);
    if (ventana) {
        $.post('http://localhost/Autoescuela/controles/Control_entregas.php', {funcion: "borrar_registro", id_borrar: id},
            function (data){});
            removeTR(td);
    }
    else {
        alert("No se ha eliminado la entrega");             
    }       
}

//Funcion para cargar los values de los input para modificar un alumno
function cargardatos(id){
    $('#'+id+' td.id').each(function() {
        var id = $(this).text();
        $("#inputid").val(id);
    });
    $('#'+id+' td.fecha').each(function() {
        var fecha = $(this).text();
        $("#inputfecha").val(fecha);
    });
    $('#'+id+' td.cantidad').each(function() {
        var cant = $(this).text();
        $("#inputcantidad").val(cant);
    });
    $('#'+id+' td.id_alumno').each(function() {
        var id_alu = $(this).text();
        document.forms['forminsertar']['selectid_alumno'].value = id_alu;
    });
    $("#btninsert").val("Modificar");
    //$("#nuevoAlumno").val("modificar");
}

function cancelar(){
    
    $("#btninsert").val("Insertar");
    $("#inputid").val(0);
    $('#forminsertar').each (function(){
        this.reset();
    });
    //$("#nuevoAlumno").val("insertar");   
}

//Funcion para borrar una fila de una tabla
function removeTR(t){
    var td = t.parentNode;
    var tr = td.parentNode;
    var table = tr.parentNode;
    table.removeChild(tr);
}