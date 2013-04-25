function insertar_modificar(){
    var id = $("#inputid").val(); 
    var num = $("#inputnumero").val();
    var num_pre = $("#inputnum_preguntas").val();
    var id_col = document.forms['forminsertar']['selectid_coleccion'].value;
    
    var id_comporobacion = id;
    if(isNaN(num) || isNaN(num_pre) || id_col == 0){
    	if(isNaN(num)){
	        alert("El campo numero, solo adminte números enteros");
	        $('#inputnumero').focus();
    	}
    	if(isNaN(num_pre)){
    		alert("El campo de numero de preguntas solo admite numeros");
    		$("#inputnum_preguntas").focus();
    	}
    	if(id_col == 0){
    		alert("El test tiene que pertenecer a una coleccion");
    	}
    }else{
        $.post('http://localhost/Autoescuela/controles/Control_tests.php', {inputid:id, inputnumero:num, inputnum_preguntas: num_pre, selectid_coleccion: id_col},
        function(data){
            if(id_comporobacion == 0){
                $('#listadotabla').append('<tr id='+data+'>');
                    $('#'+data).append('<td class="id">'+data+'</td><td class="numero">'+num+'</td><td class="num_preguntas">'+num_pre+'</td><td class="id_coleccion">'+id_col+'</td>');
                    $('#'+data).append("<td align='center'><img src='img/borrar.jpg' onclick='borrar("+data+", \""+num+"\", this)' height='25px' width='25px'></td>");
                    $('#'+data).append("<td align='center'><img src='img/modificar.png' onclick='cargardatos("+data+")' height='25px' width='25px'></td>");
                $('#listadotabla').append('</tr>');
                cancelar();
            }
            else{
                $('#'+id+' td.dni').each(function() {
                    $(this).text($("#inputdni").val());
                });
                $('#'+id+' td.numero').each(function() {
                    $(this).text($("#inputnumero").val());
                });
                $('#'+id+' td.num_preguntas').each(function() {
                    $(this).text($("#inputnum_preguntas").val());
                });
                $('#'+id+' td.id_coleccion').each(function() {
                    $(this).text(document.forms['forminsertar']['selectid_coleccion'].value);
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
        $.post('http://localhost/Autoescuela/controles/Control_tests.php', {funcion: "borrar_registro", id_borrar: id},
            function (data){});
            removeTR(td);
    }
    else {
        alert("No se ha eliminado el test");             
    }       
}

//Funcion para cargar los values de los input para modificar un alumno
function cargardatos(id){
    $('#'+id+' td.id').each(function() {
        var id = $(this).text();
        $("#inputid").val(id);
    });
    $('#'+id+' td.numero').each(function() {
        var num = $(this).text();
        $("#inputnumero").val(num);
    });
    $('#'+id+' td.num_preguntas').each(function() {
        var num_pre = $(this).text();
        $("#inputnum_preguntas").val(num_pre);
    });
    $('#'+id+' td.id_coleccion').each(function() {
        var id_col = $(this).text();
        document.forms['forminsertar']['selectid_coleccion'].value = id_col;
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