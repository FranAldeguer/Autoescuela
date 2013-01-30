function insertar_modificar(){
    var id = $("#inputid").val(); 
    var nom = $("#inputnombre").val();
    var id_car = document.forms['formcol']['selectidcar'].value;
    
    var id_comporobacion = id;
    if(nom == '' || id_car == 0){
    	if(nom == ''){
	        alert("La coleccion debe llevar un nombre");
	        $('#inputnombre').focus();
    	}
    	if(id_car == 0){
    		alert("La colección debe pertenecer a un carnet");
    	}
    }else{
        $.post('http://localhost/ProyectoAutoescuela/controles/Control_colecciones.php', {inputid:id, inputnom:nom, selectidcar:id_car},
        function(data){
            if(id_comporobacion == 0){
                $('#listadotabla').append('<tr id='+data+'>');
                    $('#'+data).append('<td class="id">'+data+'</td><td class="nombre">'+nom+'</td><td class="id_carnet">'+id_car+'</td>');
                    $('#'+data).append("<td align='center'><img src='img/borrar.jpg' onclick='borrar("+data+", \""+nom+"\", this)' height='25px' width='25px'></td>");
                    $('#'+data).append("<td align='center'><img src='img/modificar.png' onclick='cargardatos("+data+")' height='25px' width='25px'></td>");
                $('#listadotabla').append('</tr>');
                cancelar();
            }
            else{
                $('#'+id+' td.nombre').each(function() {
                    $(this).text($("#inputnombre").val());
                });
                $('#'+id+' td.id_carnet').each(function() {
                    $(this).text(document.forms['formcol']['selectidcar'].value);
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
        $.post('http://localhost/ProyectoAutoescuela/controles/Control_colecciones.php', {funcion: "borrar_usuario", id_col: id},
            function (data){});
            removeTR(td);
    }
    else {
        alert("No se ha eliminado la coleccion");             
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
    $('#'+id+' td.id_carnet').each(function() {
        var id_carnet = $(this).text();
        document.forms['formcol']['selectidcar'].value = id_carnet;
    });
    $("#insertcol").val("Modificar");
    //$("#nuevoAlumno").val("modificar");
}

function cancelar(){
    
    $("#insertcol").val("Insertar");
    $("#inputid").val(0);
    $('#form_col').each (function(){
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