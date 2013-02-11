function insertar_modificar(){
    var id = $("#inputid").val(); 
    var pre = $("#inputprecio").val();
    var hor = $("#inputhora").val();
    
    var id_comporobacion = id;
    if(isNaN(pre)){
    		alert("El campo de precio solo admite numeros");
    }else{
    	alert('llega');
        $.post('http://localhost/ProyectoAutoescuela/controles/Control_precios.php', {inputid:id, inputprecio:pre, inputhora:hor},
        function(data){
            if(id_comporobacion == 0){
                $('#listadotabla').append('<tr id='+data+'>');
                    $('#'+data).append('<td class="id">'+data+'</td><td class="precio">'+pre+'</td><td class="hora">'+hor+'</td>');
                    $('#'+data).append("<td align='center'><img src='img/borrar.jpg' onclick='borrar("+data+", \""+pre+"\", this)' height='25px' width='25px'></td>");
                    $('#'+data).append("<td align='center'><img src='img/modificar.png' onclick='cargardatos("+data+")' height='25px' width='25px'></td>");
                $('#listadotabla').append('</tr>');
                cancelar();
            }
            else{
                $('#'+id+' td.dni').each(function() {
                    $(this).text($("#inputdni").val());
                });
                $('#'+id+' td.precio').each(function() {
                    $(this).text($("#inputprecio").val());
                });
                $('#'+id+' td.hora').each(function() {
                    $(this).text($("#inputhora").val());
                });
                cancelar();
            }
        });
    }
}

//Funcion para borrar un alumno
function borrar(id, hora, td){
    ventana=confirm("Eliminar -> Nombre: "+hora+" id: "+id);
    if (ventana) {
        $.post('http://localhost/ProyectoAutoescuela/controles/Control_precios.php', {funcion: "borrar_registro", id_borrar: id},
            function (data){});
            removeTR(td);
    }
    else {
        alert("No se ha eliminado la hora");             
    }       
}

//Funcion para cargar los values de los input para modificar un alumno
function cargardatos(id){
    $('#'+id+' td.id').each(function() {
        var id = $(this).text();
        $("#inputid").val(id);
    });
    $('#'+id+' td.precio').each(function() {
        var precio = $(this).text();
        $("#inputprecio").val(precio);
    });
    $('#'+id+' td.hora').each(function() {
        var hora = $(this).text();
        $("#inputhora").val(hora);
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