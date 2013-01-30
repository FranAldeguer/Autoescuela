function insertar_modificar(){
    var id = $("#inputid").val(); 
    var nom = $("#inputnombre").val();
    var pre = $("#inputprecio").val();
    var desc = $("#inputdescripcion").val();
    
    var id_comporobacion = id;
    if(nom == ''){
        ventana=confirm("El carnet debe llevar un nombre");
        $('#inputnombre').focus();
    }else{
        $.post('http://localhost/ProyectoAutoescuela/controles/Control_carnets.php', {inputid:id, inputnom:nom, inputpre: pre, inputdesc:desc},
        function(data){
            if(id_comporobacion == 0){
                if(data == 0){
                    alert("Error al insertar el carnet");
                }else{
                    $('#listadotabla').append('<tr id='+data+'>');
                        $('#'+data).append('<td class="id">'+data+'</td><td class="nombre">'+nom+'</td><td class="descripcion">'+desc+'</td><td class="precio">'+pre+'</td>');
                        $('#'+data).append("<td align='center'><img src='img/borrar.jpg' onclick='borrar("+data+", \""+nom+"\", this)' height='25px' width='25px'></td>");
                        $('#'+data).append("<td align='center'><img src='img/modificar.png' onclick='cargardatos("+data+")' height='25px' width='25px'></td>");
                    $('#listadotabla').append('</tr>');
                    cancelar();
                }
            }
            else{
                $('#'+id+' td.dni').each(function() {
                    $(this).text($("#inputdni").val());
                });
                $('#'+id+' td.nombre').each(function() {
                    $(this).text($("#inputnombre").val());
                });
                $('#'+id+' td.descripcion').each(function() {
                    $(this).text($("#inputdescripcion").val());
                });
                $('#'+id+' td.precio').each(function() {
                    $(this).text($("#inputprecio").val());
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
        $.post('http://localhost/ProyectoAutoescuela/controles/Control_carnets.php', {funcion: "borrar_usuario", id_car: id},
            function (data){});
            removeTR(td);
    }
    else {
        alert("No se ha eliminado el carnet");             
    }       
}

//Funcion para cargar los values de los input para modificar un alumno
function cargardatos(id){
    $('#'+id+' td.id').each(function() {
        var id = $(this).text();
        $("#inputid").val(id);
    });
    $('#'+id+' td.nombre').each(function() {
        var nombre = $(this).text();
        $("#inputnombre").val(nombre);
    });
    $('#'+id+' td.descripcion').each(function() {
        var desc = $(this).text();
        $("#inputdescripcion").val(desc);
    });
    $('#'+id+' td.precio').each(function() {
        var pre = $(this).text();
        $("#inputprecio").val(pre);
    });
    $("#insertcar").val("Modificar");
}

function cancelar(){
    $("#insertcar").val("Insertar");
    $("#inputid").val(0);
    $('#form_carnet').each (function(){
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