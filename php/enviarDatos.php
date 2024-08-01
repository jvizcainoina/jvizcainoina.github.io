<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['formNombre']));
    $email = filter_var(trim($_POST['formCorreo']), FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars(trim($_POST['formMensaje']));

    // Valida que los datos no estén vacíos
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    // Valida el formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico no válido.";
        exit;
    }

    // Datos del correo
    $para = "jvizcaino.ina@gmail.com";
    $asunto = "Comentarios del usuario $nombre";
    $cuerpo = "Nombre: $nombre\nCorreo Electrónico: $email\nMensaje:\n$mensaje";
    $encabezados = "From: $email";

    // Envía el correo
    if (mail($para, $asunto, $cuerpo, $encabezados)) {
        echo "Correo enviado exitosamente.";
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>