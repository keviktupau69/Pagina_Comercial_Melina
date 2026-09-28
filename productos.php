<?php
$titulo_pagina = "Productos";
include 'includes/header.php';

// Actualizamos el array para soportar 'imagen' u 'icono'
$productos = [
    ["nombre" => "Martillo de uña 16oz", "categoria" => "herramientas", "precio" => "Bs 45", "imagen" => "img/Martillo.png"],
    ["nombre" => "Taladro percutor 1/2\"",        "categoria" => "herramientas",  "precio" => "Bs 480", "imagen" => "img/TaladroPercutor.png"],
    ["nombre" => "Juego de destornilladores",    "categoria" => "herramientas",  "precio" => "Bs 60",  "imagen" => "img/Destornilladores.png"],
    ["nombre" => "Cemento portland 50kg",        "categoria" => "construccion",  "precio" => "Bs 65",  "imagen" => "img/Cemento.png"],
    ["nombre" => "Varilla de construcción 3/8\"","categoria" => "construccion",  "precio" => "Bs 38",  "imagen" => "img/Varilla.png"],
    ["nombre" => "Malla electrosoldada",         "categoria" => "construccion",  "precio" => "Bs 120", "imagen" => "img/Malla.png"],
    ["nombre" => "Tubo PVC 1/2\" x 3m",          "categoria" => "plomeria",      "precio" => "Bs 18",  "imagen" => "img/TuboPVC.png"],
    ["nombre" => "Llave de paso 1/2\"",          "categoria" => "plomeria",      "precio" => "Bs 25",  "imagen" => "img/LlavePaso.png"],
    ["nombre" => "Grifería para lavamanos",      "categoria" => "plomeria",      "precio" => "Bs 150", "imagen" => "img/Griferia.png"],
    ["nombre" => "Cable eléctrico N°12 (m)",     "categoria" => "electricidad",  "precio" => "Bs 4",   "imagen" => "img/CableElectrico.png"],
    ["nombre" => "Foco LED 12W",                 "categoria" => "electricidad",  "precio" => "Bs 15",  "imagen" => "img/FocoLED.png"],
    ["nombre" => "Interruptor doble",            "categoria" => "electricidad",  "precio" => "Bs 12",  "imagen" => "img/Interruptor.png"],
    ["nombre" => "Pintura látex 4L (blanco)",    "categoria" => "pinturas",      "precio" => "Bs 140", "imagen" => "img/Pintura.png"],
    ["nombre" => "Rodillo para pintar",          "categoria" => "pinturas",      "precio" => "Bs 20",  "imagen" => "img/Rodillo.png"],
    ["nombre" => "Casco de seguridad",           "categoria" => "seguridad",     "precio" => "Bs 55",  "imagen" => "img/Casco.png"],
    ["nombre" => "Guantes industriales",         "categoria" => "seguridad",     "precio" => "Bs 22",  "imagen" => "img/Guantes.png"],
];

$categoria_url = isset($_GET['categoria']) ? htmlspecialchars($_GET['categoria']) : 'todos';

$categorias_disponibles = [
    'todos'        => 'Todos',
    'herramientas' => 'Herramientas',
    'construccion' => 'Construcción',
    'plomeria'     => 'Plomería',
    'electricidad' => 'Electricidad',
    'pinturas'     => 'Pinturas',
    'seguridad'    => 'Seguridad',
];
?>

<section class="nosotros-hero">
    <div class="container">
        <h1>Nuestros Productos</h1>
        <p>Encuentra todo lo que necesitas para tu proyecto</p>
    </div>
</section>

<section class="productos">
    <div class="container">

        <div class="filtros">
            <?php foreach ($categorias_disponibles as $clave => $nombre): ?>
                <button
                    class="filtro-btn <?php echo ($clave === $categoria_url) ? 'active' : ''; ?>"
                    data-categoria="<?php echo $clave; ?>">
                    <?php echo $nombre; ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="productos-grid">
            <?php foreach ($productos as $producto): ?>
                <?php
                    $oculto = ($categoria_url !== 'todos' && $producto['categoria'] !== $categoria_url);
                ?>
                <div class="producto-card" data-categoria="<?php echo $producto['categoria']; ?>"
                     style="<?php echo $oculto ? 'display:none;' : ''; ?>">
                    
                    <div class="producto-img">
                        <?php if (isset($producto['imagen']) && !empty($producto['imagen'])): ?>
                            <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <?php else: ?>
                            <?php echo $producto['icono'] ?? '📦'; ?>
                        <?php endif; ?>
                    </div>

                    <div class="producto-info">
                        <span class="producto-categoria"><?php echo $categorias_disponibles[$producto['categoria']]; ?></span>
                        <h3 class="producto-nombre"><?php echo $producto['nombre']; ?></h3>
                        <p class="producto-precio"><?php echo $producto['precio']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>