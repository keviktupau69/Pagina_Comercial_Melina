<?php
$titulo_pagina = "Inicio";
include 'includes/header.php';
?>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="container hero-content">
        <span class="hero-tag">Ferretería de confianza</span>
        <h1>Todo para tu construcción, hogar y proyectos</h1>
        <p>En Comercial MELINA encuentras herramientas, materiales de construcción, plomería, electricidad y más, con la mejor calidad y precios accesibles.</p>
        <div class="hero-buttons">
            <a href="productos.php" class="btn btn-primary">Ver productos</a>
            <a href="contacto.php" class="btn btn-outline">Contáctanos</a>
        </div>
    </div>
</section>

<!-- ===== VENTAJAS ===== -->
<section class="ventajas">
    <div class="container">
        <h2 class="section-title">¿Por qué elegirnos?</h2>
        <p class="section-subtitle">Trabajamos cada día para ofrecerte la mejor experiencia de compra.</p>

        <div class="ventajas-grid">
            <div class="ventaja-card">
                <div class="ventaja-icon">🏆</div>
                <h3>Calidad</h3>
                <p>Productos de marcas confiables, probados para durar.</p>
            </div>
            <div class="ventaja-card">
                <div class="ventaja-icon">💰</div>
                <h3>Precio</h3>
                <p>Precios competitivos y accesibles para todo tipo de proyecto.</p>
            </div>
            <div class="ventaja-card">
                <div class="ventaja-icon">🤝</div>
                <h3>Experiencia</h3>
                <p>Años de trayectoria brindando soluciones a nuestros clientes.</p>
            </div>
            <div class="ventaja-card">
                <div class="ventaja-icon">🚚</div>
                <h3>Entrega rápida</h3>
                <p>Coordinamos la entrega de tu pedido de forma puntual.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== CATEGORIAS ===== -->
<section class="categorias">
    <div class="container">
        <h2 class="section-title">Nuestras categorías</h2>
        <p class="section-subtitle">Explora la variedad de productos que tenemos para ti.</p>

        <div class="categorias-grid">
            <a href="productos.php?categoria=herramientas" class="categoria-card">
                <div class="categoria-icon">🔨</div>
                <h4>Herramientas</h4>
            </a>
            <a href="productos.php?categoria=construccion" class="categoria-card">
                <div class="categoria-icon">🧱</div>
                <h4>Construcción</h4>
            </a>
            <a href="productos.php?categoria=plomeria" class="categoria-card">
                <div class="categoria-icon">🚿</div>
                <h4>Plomería</h4>
            </a>
            <a href="productos.php?categoria=electricidad" class="categoria-card">
                <div class="categoria-icon">💡</div>
                <h4>Electricidad</h4>
            </a>
            <a href="productos.php?categoria=pinturas" class="categoria-card">
                <div class="categoria-icon">🎨</div>
                <h4>Pinturas</h4>
            </a>
            <a href="productos.php?categoria=seguridad" class="categoria-card">
                <div class="categoria-icon">🦺</div>
                <h4>Seguridad</h4>
            </a>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta">
    <div class="container">
        <h2>¿Necesitas asesoría para tu proyecto?</h2>
        <p>Escríbenos y con gusto te ayudamos a encontrar lo que necesitas.</p>
        <br>
        <a href="contacto.php" class="btn btn-outline">Contáctanos ahora</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
