<?php
// ====== PROCESO PHP (arriba del todo) ======
$mensaje = "";
$tipoMensaje = ""; // "ok" o "error"

// Recoger datos con $_POST
$nombre = $_POST["nombre"] ?? "";
$email = $_POST["email"] ?? "";
$fecha = $_POST["fecha"] ?? "";
$ciudad = $_POST["ciudad"] ?? "";
$invitados = $_POST["invitados"] ?? "";
$servicio = $_POST["servicio"] ?? "";
$comentarios = $_POST["comentarios"] ?? "";

// Dentro de POST aplicamos trim()
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($nombre);
    $email = trim($email);
    $ciudad = trim($ciudad);
    $servicio = trim($servicio);

    // Validar campos obligatorios
    if ($nombre === "" || $email === "" || $ciudad === "" || $servicio === "") {
        $mensaje = "⚠️ Revisa los campos obligatorios (Nombre, Email, Ciudad y Servicio).";
        $tipoMensaje = "error";
    // Validar el formato del email con filter_var()
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "⚠️ Escribe un email válido.";
        $tipoMensaje = "error";
    // Mostrar un mensaje dinámico según el resultado
    } else {
        $mensaje = "✅ ¡Solicitud enviada! Te responderemos en 24–48h con una propuesta orientativa.";
        $tipoMensaje = "ok";
    }
}

/* Esto evita que alguien escriba código malicioso en el formulario. */
function e($value) {
    return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8");
}
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Presupuesto | Wedding Planner</title>

  <link rel="stylesheet" href="assets/styles.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <div class="wrap">
      <h1>Presupuesto de Boda</h1>
      <p class="subtitle">
        A unos pocos clics de organizar uno de los mejores días de vuestra vida.
        <br>Soy wedding planner y prepararé una propuesta según vuestra fecha, ciudad y estilo.
        <br>Rellena lo básico y te respondo en 24–48h.
      </p>
    </div>
  </header>

  <main class="wrap">
    <section class="card" aria-label="Formulario de presupuesto">
      <h2 class="card-title">Detalles de vuestra boda</h2>
      <p class="hint">Los campos con <span class="required">*</span> son obligatorios.</p>

      <!-- Mensaje PHP (servidor) -->
      <?php if ($mensaje !== ""): ?>
        <div class="msg <?php echo e($tipoMensaje); ?>">
          <?php echo e($mensaje); ?>
        </div>
      <?php endif; ?>

      <!-- Mensaje JS (cliente) -->
      <div id="frontendMsg" class="msg error" style="display:none;"></div>

      <form id="budgetForm" method="post" action="">
        <div class="grid">
          <div>
            <label for="nombre">Nombre y apellidos <span class="required">*</span></label>
            <input id="nombre" name="nombre" type="text" value="<?php echo e($nombre); ?>" placeholder="Ej: Ana Piñeiro" required>
          </div>

          <div>
            <label for="email">Email <span class="required">*</span></label>
            <input id="email" name="email" type="email" value="<?php echo e($email); ?>" placeholder="tu@email.com" required>
          </div>

          <div>
            <label for="fecha">Fecha de la boda</label>
            <input id="fecha" name="fecha" type="date" value="<?php echo e($fecha); ?>">
          </div>

          <div>
            <label for="ciudad">Ciudad / zona <span class="required">*</span></label>
            <input id="ciudad" name="ciudad" type="text" value="<?php echo e($ciudad); ?>" placeholder="Ej: Vigo" required>
          </div>

          <div>
            <label for="invitados">Invitados (aprox.)</label>
            <input id="invitados" name="invitados" type="number" min="0" value="<?php echo e($invitados); ?>" placeholder="Ej: 120">
          </div>

          <div>
            <label for="servicio">Servicio <span class="required">*</span></label>
            <select id="servicio" name="servicio" required>
              <option value="">Selecciona</option>
              <option value="Planificación completa" <?php echo ($servicio==="Planificación completa") ? "selected" : ""; ?>>Planificación completa</option>
              <option value="Coordinación del día B" <?php echo ($servicio==="Coordinación del día B") ? "selected" : ""; ?>>Coordinación del día B</option>
              <option value="Asesoría puntual" <?php echo ($servicio==="Asesoría puntual") ? "selected" : ""; ?>>Asesoría puntual</option>
            </select>
          </div>

          <div class="full">
            <label for="comentarios">Cuéntame el estilo / ideas / dudas</label>
            <textarea id="comentarios" name="comentarios" placeholder="Ej: boda elegante, íntima, queremos priorizar fotografía y decoración..."><?php echo e($comentarios); ?></textarea>
          </div>

          <div class="full">
            <button class="btn" type="submit">Enviar solicitud</button>
            <p class="note">* Esto es una práctica: en un proyecto real podrías enviar el formulario por email o guardarlo en base de datos.</p>
          </div>
        </div>
      </form>

    </section>
  </main>

  <footer>
    <div class="wrap">Entrega Semana 1 · index.php · PHP + HTML</div>
  </footer>

  <!-- Validación en JavaScript (cliente) -->
  <script src="assets/validacion.js"></script>
</body>
</html>