function insertar_modificar(){
    var id = $("#inputid").val(); 
    var dni = $("#inputdni").val();
    var nom = $("#inputnombre").val();
    var ape = $("#inputapellidos").val();
    var telf = $("#inputtelefono").val();
    var mail = $("#inputmail").val();
    var practico = $("#inputpractico").val();
    var encargado = $("#inputencargado").val();
    
    var id_comporobacion = id;
    if(nom == ''){
        ventana=confirm("El profesor debe llevar un nombre");
        $('#inputnombre').focus();
    }else{
        if($("#inputpractico").is(":checked")){
                practico = 1;
            }else{
                practico = 0;
            }
            if($("#inputencargado").is(":checked")){
                encargado = 1;
            }else{
                encargado = 0;
            }
        $.post('http://localhost/ProyectoAutoescuela/controles/Control_profesores.php', {inputid:id, inputdni:dni, inputnom:nom, inputape: ape, inputtelf:telf, inputmail:mail, inputpractico:practico, inputencargado:encargado},
        function(data){
            if(telf == ""){telf = 0}
            
            
            if(id_comporobacion == 0){
                $('#listadotabla').append('<tr id='+data+'>');
                    $('#'+data).append('<td class="id">'+data+'</td><td class="dni">'+dni+'</td><td class="nombre">'+nom+'</td><td class="apellidos">'+ape+'</td><td class="mail">'+mail+'</td><td class="telefono">'+telf+'</td>');
                    if(practico == 0){
                        $('#'+data).append("<td class='practico' align='center' value = '0'><img src='img/cross.png' height='25px' width='25px'></td>")
                    }else{
                        $('#'+data).append("<td class='practico' align='center' value = '1'><img src='img/tick.png' height='25px' width='25px'></td>")
                    }
                    if(encargado == 0){
                        $('#'+data).append("<td class='encargado' align='center' value = '0'><img src='img/cross.png' height='25px' width='25px'></td>")
                    }else{
                        $('#'+data).append("<td class='encargado' align='center' value = '1'><img src='img/tick.png' height='25px' width='25px'></td>")
                    }
                    $('#'+data).append("<td align='center'><img src='img/borrar.jpg' onclick='borrar("+data+", \""+nom+"\", this)' height='25px' width='25px'></td>");
                    $('#'+data).append("<td align='center'><img src='img/modificar.png' onclick='cargardatos("+data+")' height='25px' width='25px'></td>");
                $('#listadotabla').append('</tr>');
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
                $('#'+id+' td.telefono').each(function() {
                    $(this).text($("#inputtelefono").val());
                });
                $('#'+id+' td.mail').each(function() {
                    $(this).text($("#inputmail").val());
                });
                
                
                $('#'+id+' td.practico').each(function() {
                    if($("#inputpractico").is(":checked")){
                        $(this).html("<img src='img/tick.png' height='25px' width='25px'>");
                    }else{
                        $(this).html("<img src='img/cross.png' height='25px' width='25px'>");
                    }
                });
                $('#'+id+' td.encargado').each(function() {
                    if($("#inputencargado").is(":checked")){
                        $(this).html("<img src='img/tick.png' height='25px' width='25px'>");
                    }else{
                        $(this).html("<img src='img/cross.png' height='25px' width='25px'>");
                    }
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
        $.post('http://localhost/ProyectoAutoescuela/controles/Control_profesores.php', {funcion: "borrar_usuario", id_prof: id},
            function (data){});
            removeTR(td);
    }
    else {
        alert("No se ha eliminado el profesor");             
    }       
}

function cargardatos(id){
    $('#'+id+' td.id').each(function() {
        var id = $(this).text();
        $("#inputid").val(id);
    });
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
    $('#'+id+' td.telefono').each(function() {
        var telefono = $(this).text();
        $("#inputtelefono").val(telefono);
    });
    $('#'+id+' td.mail').each(function() {
        var mail = $(this).text();
        $("#inputmail").val(mail);
    });
    $('#'+id+' td.practico').each(function(){
        var practico = $(this).text();
        if($(this).attr("value") != 0){
            $("#inputpractico").attr("checked","checked");
        }else{
            $("#inputpractico").removeAttr("checked");
        }
    });
    
    $('#'+id+' td.encargado').each(function(){
        var encargado = $(this).text();
        if($(this).attr("value") != 0){
            $("#inputencargado").attr("checked","checked");
        }else{
            $("#inputencargado").removeAttr("checked");
        }
    });
    $("#insertprof").val("Modificar");
}

function cancelar(){
    
    $("#insertprof").val("Insertar");
    $("#inputid").val(0);
    $('#formprof').each (function(){
        this.reset();
    });
    $("#inputpractico").removeAttr("checked");
    $("#inputencargado").removeAttr("checked");
    //$("#nuevoAlumno").val("insertar");   
}

function removeTR(t){
    var td = t.parentNode;
    var tr = td.parentNode;
    var table = tr.parentNode;
    table.removeChild(tr);
}