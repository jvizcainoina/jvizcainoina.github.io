//Todas las funciones de Jquery inician con $
$(document).ready(function(){
    //ready --> verifica y ejecuta código al cargar el HTML

    //Jquery nos permite utilizar y dar funcionalidad a todos los elementos cargados en el html

    //Busca un elemento llamado button y tenga la clase llamada cargar
    $("button#cargar").click(function(){
        //Al presionar el button, llama y ejecuta una función
        funCargarDatos();
    });

    //Asigna eliminar al botón
    $("button#elimina").click(function(){
        //Al presionar el button, llama y ejecuta una funcion
        funEliminarDatos();
    });

    //Oculta el id contenido desde el principio en la carga del HTML
    $("#contenido").hide();

});//fin JQuery

function funCargarDatos(){
    //hace una llamada a AJAX
    $.ajax({
        url:"./js/datos.json"
    }).done(function(respuesta){
        //done --> responde cuando todos los datos han sido cargados exitosamente, y si son correctos ejecuta el código de la función destinada. (el done == status 200)

        //respuesta es el nombre que se creo para el objeto de JSON
        console.log("respuesta", respuesta);

        //Mostrar datos obtenidos del JSON, en la pantalla del HTML
        $("#contenido").html("Nombre: " +respuesta.nombre +" " +respuesta.apellido +"<br>Edad: " +respuesta.edad
                 +"<br>Teléfono: " +respuesta.telefono 
                 +"<br>Dirección: " +respuesta.direccion);

        //Mostrar los datos dentro de contenido usando un efecto de slide
        $("#contenido").slideDown("slow"); //slow - fast

        //Mostrar en Formulario
        $("#formNombre").val(respuesta.nombre + " " +respuesta.apellido);
        $("#formEdad").val(respuesta.edad);
        $("#formTelefono").val(respuesta.telefono);
        $("#formDireccion").val(respuesta.direccion);
    });
};//fin function

function funEliminarDatos(){
    $("#contenido").html("");
    $("#contenido").hide(2000);

    $("#formEdad").val("");
    $("#formTelefono").val("");
    $("#formDireccion").val("");
    $("#formNombre").val("");
}//fin function