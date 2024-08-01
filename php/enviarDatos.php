<?php
			/*versión de PHP 5.5*/
	//Guarda en el email donde se enviará la información
	$vEmail = "jvizcaino.ina@gmail.com";

	//Guarda el asunto del email
	$vAsunto = "Comentarios del Usuario";

	//Crea variables para guardar los datos que vienen del formulario
	$vNombre  = $_POST["formNombre"];
	$vCorreo  = $_POST["formCorreo"];
	$vMensaje = $_POST["formMensaje"];

	/*Combina toda la información en un solo mensaje
		(concatena texto y contenido de las variables)
		
		punto 	= sirve para concatenar
		\n 		= sirve para crear un salto del línea*/
	$vMensajeCompleto = "Nombre del Usuario: " 	.$vNombre ."\n"
						."Correo Personal: "	.$vCorreo ."\n"
						."Mensaje del Usuario: ".$vMensaje;
	
	/*Página donde va a ser redirigidad después de presionar el botón de enviar*/
	$vPaginaRedirigir = "../agradecimiento.html";

	/*Envía la información capturada hacia un correo electrónico
		mail 	=> coloca el correo, asunto, cuerpo del correo
		header 	=> ayuda a redirigir hacia otra página web*/
	if(mail ($vEmail,$vAsunto,$vMensajeCompleto))Header("location: $vPaginaRedirigir");
?>
