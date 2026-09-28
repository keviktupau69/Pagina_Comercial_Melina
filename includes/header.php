<?php
// Nombre de la página actual, usado para resaltar el enlace activo del menú
$pagina_actual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($titulo_pagina) ? $titulo_pagina . ' | Comercial MELINA' : 'Comercial MELINA - Ferretería'; ?></title>
<meta name="description" content="Comercial MELINA - Ferretería con herramientas, materiales de construcción, plomería, electricidad y más.">
<link rel="stylesheet" href="css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a href="index.php" class="logo">
            <span class="logo-icon">🔧</span>
            <span class="logo-text">Comercial <strong>MELINA</strong></span>
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú">
            <span></span><span></span><span></span>
        </button>

        <nav class="main-nav" id="mainNav">
            <ul>
                <li><a href="index.php" class="<?php echo $pagina_actual=='index.php'?'active':''; ?>">Inicio</a></li>
                <li><a href="productos.php" class="<?php echo $pagina_actual=='productos.php'?'active':''; ?>">Productos</a></li>
                <li><a href="nosotros.php" class="<?php echo $pagina_actual=='nosotros.php'?'active':''; ?>">Nosotros</a></li>
                <li><a href="contacto.php" class="<?php echo $pagina_actual=='contacto.php'?'active':''; ?>">Contacto</a></li>
            </ul>
        </nav>

        <a href="https://wa.me/59169531588" target="_blank" rel="noopener" class="btn btn-whatsapp">
            📞 WhatsApp
        </a>
    </div>
</header>
