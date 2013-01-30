function cargardatos(id){
    $('#'+id+' td.id').each(function() {
        var id = $(this).text();
        $("#inputid").val(id);
    });
    $('#'+id+' td.numero').each(function() {
        var num = $(this).text();
        $("#inputnum").val(num);
    });
    $('#'+id+' td.num_preguntas').each(function() {
        var pre = $(this).text();
        $("#inputpre").val(pre);
    });
    $('#'+id+' td.id_coleccion').each(function() {
        var idcol = $(this).text();
        document.forms['formtest']['selectidCol'].value = idcol;
    });
    $("#inserttest").val("Modificar");
    //$("#nuevoAlumno").val("modificar");
}

//Funcion para borrar un alumno
function borrar(id, nombre, td){
    ventana=confirm("Eliminar -> Numero: "+nombre+" id: "+id);
    if (ventana) {
        $.post('http://localhost/ProyectoAutoescuela/controles/Control_tests.php', {funcion: "borrar_usuario", id_alu: id},
            function (data){});
            removeTR(td);
    }
    else {
        alert("No se ha eliminado el alumno");             
    }       
}

//Funcion para borrar una fila de una tabla
function removeTR(t){
    var td = t.parentNode;
    var tr = td.parentNode;
    var table = tr.parentNode;
    table.removeChild(tr);
}