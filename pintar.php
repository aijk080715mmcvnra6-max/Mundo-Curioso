<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Paint Básico</title>
  <style>
    * { box-sizing: border-box; }
    body { font-family: Arial, sans-serif; background: url('imagenes/fondonubes.jpg') center/cover no-repeat; background-attachment: fixed; margin: 0; padding: 0; background-color: #fff5f5; }
    header { width: 100%; height: 120px; position: relative; background-color: #aadbfc; border-bottom: 3px solid #ff66ff5f; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
    .header-contenido { height: 70%; display: flex; align-items: flex-end; justify-content: center; position: relative; padding-bottom: 10px; }
    .logo img { position: absolute; top: -20px; left: 2px; height: 170px; z-index: 5; }
    .login { position: absolute; right: 20px; bottom: 10px; }
    .login img { height: 60px; cursor: pointer; }
    .titulo { text-align: center; }
    .titulo h1 { margin: 0; font-size: 45px; color: #f20c4697; font-weight: bold; line-height: 1.2; }
    .titulo p { margin: 0; font-size: 20px; color: #003366; line-height: 1.2; }
    .navegacion { display: flex; justify-content: center; gap: 20px; background-color: #f2b8e7e0; padding: 10px; box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.1); }
    .navegacion a { text-decoration: none; color: #0c0100; font-weight: bold; padding: 6px 12px; border-radius: 6px; }
    .navegacion a:hover { background-color: #ff004875; color: black; }
    .footer { margin-top: 50px; background-color: #aadbfc; text-align: center; padding: 15px; font-size: 14px; color: #333; border-top: 3px solid #FFD966; width: 100%; }
    
    .container { max-width: 800px; margin: 30px auto; background-color: #FFC0CB; padding: 20px; border-radius: 8px; box-shadow: 0 10px rgba(0, 0, 0, 0.1); }
    h1 { text-align: center; color: #333; }
    .controls { margin-bottom: 20px; display: flex; align-items: center; gap: 15px; flex-wrap: wrap; justify-content: center; }
    label { font-weight: bold; }
    canvas { border: 1px solid #ccc; background-color: white; cursor: crosshair; width: 100%; height: 500px; }
    button { padding: 5px 10px; cursor: pointer; background-color: #4CAF50; color: white; border: none; border-radius: 4px; }
    button:hover { background-color: #453049; }
  </style>
</head>
<body>

  <header>
    <div class="header-contenido">
      <div class="logo">
        <img src="imagenes/panda.png" alt="Logo Peke Kamp">
      </div>
      <div class="titulo">
        <h1>Mundo Curioso</h1>
        <p>¡Descubre, Crea y Juega!</p>
      </div>
      <div class="login" style="text-align: center; margin-top: 15px;">
        <?php if(isset($_SESSION['nombre'])): ?>
            <span style="color: #003366; font-size: 18px; font-weight: bold;">¡Hola, <?= $_SESSION['nombre']; ?>!</span><br>
            <a href="logout.php" style="color: #f20c46; text-decoration: none; font-weight: bold; font-size: 14px;">Cerrar sesión</a>
        <?php else: ?>
            <a href=" index.html"><img src="imagenes/login.png" alt="Iniciar sesión"></a>
        <?php endif; ?>
      </div>
    </div>
    <nav class="navegacion">
      <a href="canciones.php">Canciones</a>
      <a href="cuentos.php">Cuentos</a>
      <a href="adivinanzas.php">Adivinanzas</a>
      <a href="juegos.php">Volver a Juegos</a>
    </nav>
  </header>

  <img src="imagenes/logo.png" alt="logo"
       style="position: absolute; left: 30px; top: 65%; transform: translateY(-50%); width: 210px; cursor: pointer;"
       onclick="location.href='juegos.php'">
  
  <div class="container">
    <h1>¡Pinta Loca!</h1>
    <div class="controls">
      <label for="color">Color:</label>
      <input type="color" id="color" value="#000000">
      <label for="size">Tamaño:</label>
      <input type="range" id="size" min="1" max="50" value="5">
      <span id="sizeValue">5</span>
      <button id="clear">Limpiar</button>
    </div>
    <canvas id="canvas"></canvas>
  </div>

  <footer class="footer">
    <p>© 2025 Mundo Curioso | Juegos, cuentos y diversión educativa para niños creativos.</p>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const canvas = document.getElementById('canvas');
      const ctx = canvas.getContext('2d');
      const colorPicker = document.getElementById('color');
      const sizeSlider = document.getElementById('size');
      const sizeValue = document.getElementById('sizeValue');
      const clearBtn = document.getElementById('clear');

      function resizeCanvas() {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
      }
      window.addEventListener('resize', resizeCanvas);
      resizeCanvas();

      let isDrawing = false;
      canvas.addEventListener('mousedown', startDrawing);
      canvas.addEventListener('mousemove', draw);
      canvas.addEventListener('mouseup', stopDrawing);
      canvas.addEventListener('mouseout', stopDrawing);

      canvas.addEventListener('touchstart', handleTouchStart);
      canvas.addEventListener('touchmove', handleTouchMove);
      canvas.addEventListener('touchend', stopDrawing);

      sizeSlider.addEventListener('input', () => {
        sizeValue.textContent = sizeSlider.value;
      });

      clearBtn.addEventListener('click', () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
      });

      function startDrawing(e) {
        isDrawing = true; draw(e);
      }
      function draw(e) {
        if (!isDrawing) return;
        ctx.lineWidth = sizeSlider.value;
        ctx.lineCap = 'round';
        ctx.strokeStyle = colorPicker.value;
        const rect = canvas.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        if (e.type === 'mousedown') {
          ctx.beginPath(); ctx.moveTo(x, y);
        } else {
          ctx.lineTo(x, y); ctx.stroke();
        }
      }
      function stopDrawing() {
        isDrawing = false; ctx.beginPath();
      }
      function handleTouchStart(e) {
        e.preventDefault(); const touch = e.touches[0];
        const mouseEvent = new MouseEvent('mousedown', { clientX: touch.clientX, clientY: touch.clientY });
        canvas.dispatchEvent(mouseEvent);
      }
      function handleTouchMove(e) {
        e.preventDefault(); const touch = e.touches[0];
        const mouseEvent = new MouseEvent('mousemove', { clientX: touch.clientX, clientY: touch.clientY });
        canvas.dispatchEvent(mouseEvent);
      }
    });
  </script>
</body>
</html>