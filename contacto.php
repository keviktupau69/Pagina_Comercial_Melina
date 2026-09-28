<?php
$titulo_pagina = "Contacto";

// ==========================================================
// Lógica del lado del servidor: se ejecuta cuando el
// formulario se envía por método POST.
// ==========================================================
$mensaje_resultado = "";
$tipo_alerta = "";
$valores = ["nombre" => "", "email" => "", "telefono" => "", "asunto" => "", "mensaje" => ""];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Recoger y limpiar los datos enviados
    $nombre   = trim(htmlspecialchars($_POST['nombre'] ?? ''));
    $email    = trim(htmlspecialchars($_POST['email'] ?? ''));
    $telefono = trim(htmlspecialchars($_POST['telefono'] ?? ''));
    $asunto   = trim(htmlspecialchars($_POST['asunto'] ?? ''));
    $mensaje  = trim(htmlspecialchars($_POST['mensaje'] ?? ''));

    // Para volver a mostrar lo que el usuario escribió si hay error
    $valores = compact('nombre', 'email', 'telefono', 'asunto', 'mensaje');

    // 2. Validar en el servidor (nunca confiar solo en la validación de JS)
    $errores = [];

    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Ingresa un correo electrónico válido.";
    }
    if (empty($mensaje)) {
        $errores[] = "El mensaje no puede estar vacío.";
    }

    if (empty($errores)) {
        // 3. Aquí normalmente se enviaría un correo (mail()) o se
        //    guardaría en una base de datos. Se deja preparado un
        //    ejemplo con mail() comentado, ya que muchos servidores
        //    de prueba locales no tienen SMTP configurado.
        //
        // $para = "contacto@comercialmelina.com";
        // $titulo_correo = "Nuevo mensaje de contacto: $asunto";
        // $cuerpo = "Nombre: $nombre\nEmail: $email\nTeléfono: $telefono\n\nMensaje:\n$mensaje";
        // $cabeceras = "From: $email";
        // mail($para, $titulo_correo, $cuerpo, $cabeceras);

        // Como alternativa simple, guardamos el mensaje en un archivo de registro
        $linea = date('Y-m-d H:i:s') . " | $nombre | $email | $telefono | $asunto | $mensaje" . PHP_EOL;
        @file_put_contents(__DIR__ . '/php/mensajes.log', $linea, FILE_APPEND);

        $mensaje_resultado = "¡Gracias, $nombre! Tu mensaje fue enviado correctamente. Te responderemos pronto.";
        $tipo_alerta = "exito";
        $valores = ["nombre" => "", "email" => "", "telefono" => "", "asunto" => "", "mensaje" => ""]; // limpiar formulario
    } else {
        $mensaje_resultado = implode(" ", $errores);
        $tipo_alerta = "error";
    }
}

include 'includes/header.php';
?>

<section class="nosotros-hero">
    <div class="container">
        <h1>Contáctanos</h1>
        <p>Estamos para ayudarte con tu próximo proyecto</p>
    </div>
</section>

<section class="contacto-section">
    <div class="container contacto-grid">

        <div>
            <h2>Envíanos un mensaje</h2>
            <br>

            <?php if ($mensaje_resultado): ?>
                <div class="alerta <?php echo $tipo_alerta === 'exito' ? 'alerta-exito' : 'alerta-error'; ?>">
                    <?php echo $mensaje_resultado; ?>
                </div>
            <?php endif; ?>

            <form id="formContacto" action="contacto.php" method="POST" novalidate>
                <div class="form-group">
                    <label for="nombre">Nombre completo *</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $valores['nombre']; ?>">
                    <span class="error-msg" id="error-nombre"></span>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico *</label>
                    <input type="email" id="email" name="email" value="<?php echo $valores['email']; ?>">
                    <span class="error-msg" id="error-email"></span>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" id="telefono" name="telefono" value="<?php echo $valores['telefono']; ?>">
                </div>

                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <select id="asunto" name="asunto">
                        <option value="Consulta general" <?php echo $valores['asunto']==='Consulta general'?'selected':''; ?>>Consulta general</option>
                        <option value="Cotización" <?php echo $valores['asunto']==='Cotización'?'selected':''; ?>>Cotización</option>
                        <option value="Reclamo" <?php echo $valores['asunto']==='Reclamo'?'selected':''; ?>>Reclamo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje *</label>
                    <textarea id="mensaje" name="mensaje" rows="5"><?php echo $valores['mensaje']; ?></textarea>
                    <span class="error-msg" id="error-mensaje"></span>
                </div>

                <button type="submit" class="btn btn-primary">Enviar mensaje</button>
            </form>
        </div>

        <div>
            <div class="info-contacto-card">
                <h3>Información de contacto</h3>
                <div class="info-item">
                    <span class="icon">📍</span>
                    <span>Cochabamba, Esteban Arze y Quillacollo, Bolivia</span>
                </div>
                <div class="info-item">
                    <span class="icon">📞</span>
                    <span>+591 69531588</span>
                </div>
                <div class="info-item">
                    <span class="icon">✉️</span>
                    <span>contacto@comercialmelina.com</span>
                </div>
                <div class="info-item">
                    <span class="icon">🕒</span>
                    <span>Lun. a Sáb. 8:00 - 19:00</span>
                </div>
            </div>

            <div class="mapa-embed">
                <iframe
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d270.1656910787933!2d-66.15634601620148!3d-17.406723071232598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e373007e30ea7d%3A0x5e0a09060fd0b8f6!2sDistribuidor%20Arando!5e1!3m2!1ses-419!2sbo!4v1788840239222!5m2!1ses-419!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
