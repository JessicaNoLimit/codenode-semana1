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

/* Esto evita que alguien escriba código malicioso en el formulario.*/
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
  <style>
    :root{
      --gold:#c9a34a;
      --gold-soft:#f4e7c7;
      --text:#1f1f1f;
      --muted:#666;
      --line:#e9e2d3;
      --bg:#ffffff;
      --card:#fffaf0;
      --font-title: "Playfair Display", serif;
      --font-body: "Inter", Arial, sans-serif;
    }

    *{ box-sizing:border-box; }
    
/* fondo de nubes */
body{
  margin:0;
  font-family: var(--font-body);
  color:var(--text);
  background: url("./assets/nubesrosas.png") center / cover no-repeat fixed;
}
    header{
  padding: 40px 16px 22px;
  text-align: center;
  border-bottom: 0;
}

header .wrap{
  background: rgba(255,255,255,.72);
  border: 1px solid rgba(201,163,74,.25);
  border-radius: 18px;
  padding: 22px 18px;
  backdrop-filter: blur(4px);
}

.subtitle{
  margin: 10px 0 0;
  color: #4f4f4f;
  line-height: 1.6;
  font-size: 14px;
}

    .wrap{
      max-width: 900px;
      margin: 0 auto;
      padding: 0 16px;
    }

h1{
  margin:0;
  font-family: "Great Vibes", cursive;
  font-size: 44px;
  color: var(--gold);
  letter-spacing: .5px;
  text-shadow: 0 2px 8px rgba(0,0,0,.08);
}

    .subtitle{
      margin: 8px 0 0;
      color: var(--muted);
      line-height: 1.4;
    }

    main{
      padding: 22px 0 40px;
    }

    .card{
      background: var(--card);
      border: 1px solid var(--line);
      border-radius: 14px;
      padding: 18px;
    }

.card-title{
  margin:0;
  font-family: var(--font-title);
  font-size: 22px;
  letter-spacing: .2px;
}
    .grid{
      display:grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-top: 14px;
    }

    @media (max-width: 760px){
      .grid{ grid-template-columns: 1fr; }
    }

    label{
      display:block;
      font-size: 13px;
      color: var(--muted);
      margin-bottom: 6px;
    }

    input, select, textarea{
      width:100%;
      padding: 10px 10px;
      border: 1px solid var(--line);
      border-radius: 10px;
      background: white;
      outline: none;
      font-size: 14px;
    }

    input:focus, select:focus, textarea:focus{
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(201,163,74,.20);
    }

    textarea{ min-height: 110px; resize: vertical; }

    .full{ grid-column: 1 / -1; }

    .btn{
      border: 0;
      background: var(--gold);
      color: white;
      padding: 11px 14px;
      border-radius: 10px;
      cursor: pointer;
      font-weight: bold;
    }

    .btn:hover{ filter: brightness(1.05); }

    .note{
      font-size: 12px;
      color: var(--muted);
      margin-top: 10px;
    }

    .msg{
      padding: 12px;
      border-radius: 10px;
      margin-top: 14px;
      border: 1px solid var(--line);
      background: white;
    }
    .msg.ok{
      border-color: rgba(201,163,74,.45);
      background: #fffdf7;
    }
    .msg.error{
      border-color: rgba(200,0,0,.25);
      background: #fff6f6;
    }

    footer{
  border-top: 0;
  padding: 16px;
  color: var(--muted);
  font-size: 12px;
  text-align: center;
}

    .required{
      color: var(--gold);
      font-weight: bold;
    }
  </style>
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
      <p style="margin:6px 0 0; color:var(--muted);">Los campos con <span class="required">*</span> son obligatorios.</p>
      <!-- Mostrar el mensaje en HTML -->     
      <?php if ($mensaje !== ""): ?>
        <div class="msg <?php echo e($tipoMensaje); ?>">
          <?php echo e($mensaje); ?>
        </div>
      <?php endif; ?>

      <form method="post" action="">
        <div class="grid">
          <div>
            <label for="nombre">Nombre y apellidos <span class="required">*</span></label>
            <!-- Mantener los valores del formulario con (value="?php echo e($   ); y el selected -->
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
              <!-- Si el usuario eligió esa opción, márcala otra vez-->
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
</body>
</html>