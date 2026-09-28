# Comercial MELINA - Página web de ferretería

Proyecto de página web sencilla para una ferretería, hecho con **HTML5, CSS3, JavaScript** (frontend) y **PHP** (backend).

## 📁 Estructura del proyecto

```
comercial-melina/
├── index.php          → Página de inicio (Hero, ventajas, categorías)
├── productos.php       → Catálogo de productos (datos generados en PHP + filtro con JS)
├── nosotros.php         → Página "Sobre nosotros"
├── contacto.php         → Formulario de contacto (validado en PHP y JS)
├── includes/
│   ├── header.php       → Menú de navegación (reutilizado en todas las páginas)
│   └── footer.php       → Pie de página (reutilizado en todas las páginas)
├── css/
│   └── style.css        → Todos los estilos del sitio
├── js/
│   └── script.js         → Menú móvil, filtro de productos, validación de formulario
└── php/
    └── mensajes.log      → Aquí se guardan los mensajes recibidos por el formulario
```

## 🚀 Cómo ejecutarlo

Necesitas tener PHP instalado (viene incluido en XAMPP, WAMP, Laragon, MAMP, etc.)

**Opción 1 — Servidor embebido de PHP (rápido, para pruebas):**
```bash
cd comercial-melina
php -S localhost:8000
```
Luego abre en el navegador: `http://localhost:8000`

**Opción 2 — XAMPP / WAMP / Laragon:**
1. Copia la carpeta `comercial-melina` dentro de `htdocs` (XAMPP) o `www` (WAMP/Laragon).
2. Inicia Apache desde el panel de control.
3. Abre en el navegador: `http://localhost/comercial-melina`

## ✏️ Cómo personalizar

- **Productos:** edita el array `$productos` al inicio de `productos.php` (nombre, categoría, precio, ícono).
- **Datos de contacto / teléfono / WhatsApp:** cámbialos en `includes/header.php` y `includes/footer.php` (busca el número `59100000000`).
- **Colores:** todos los colores están centralizados como variables CSS al inicio de `css/style.css` (`:root { --color-primario: ... }`).
- **Formulario de contacto:** actualmente guarda los mensajes en `php/mensajes.log`. Si tu servidor tiene correo configurado, puedes descomentar el bloque `mail()` dentro de `contacto.php` para enviar los mensajes por email en lugar de (o además de) guardarlos en el log.

## 🔒 Notas de seguridad

- Los datos del formulario se limpian con `htmlspecialchars()` y se validan tanto en el navegador (JavaScript) como en el servidor (PHP) — la validación del servidor es la que realmente protege los datos, ya que la de JavaScript se puede evitar fácilmente.
- Si más adelante conectas una base de datos (MySQL), usa siempre **consultas preparadas (PDO o mysqli)** para evitar inyección SQL.

## 📌 Próximos pasos sugeridos

- Conectar `productos.php` a una base de datos MySQL en vez de un array fijo.
- Agregar un panel de administración simple para gestionar productos.
- Integrar el envío real de correos (PHPMailer) en `contacto.php`.
