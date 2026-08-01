<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>PEKE KAMP. Pequeños En Kreatividad Con El Mundo</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; background: url('imagenes/fondonubes.jpg') center/cover no-repeat; background-attachment: fixed; }
    header { height: 120px; position: relative; background-color: #aadbfc; border-bottom: 3px solid #ff66ff5f; box-shadow: 0 2px 5px rgba(0,0,0,0.2); overflow: visible; }
    .header-contenido { height: 70%; display: flex; align-items: flex-end; justify-content: center; position: relative; padding-bottom: 10px; }
    .logo img { position: absolute; top: -20px; left: 2px; height: 170px; z-index: 5; }
    .login { position: absolute; right: 20px; bottom: 5px; }
    .login img { height: 60px; cursor: pointer; }
    .titulo { text-align: center; }
    .titulo h1 { margin: 0; font-size: 45px; color: #f20c4697; font-weight: bold; line-height: 1.2; }
    .titulo p { margin: 0; font-size: 20px; color: #003366; line-height: 1.2; }
    .navegacion { display: flex; justify-content: center; gap: 20px; background-color: #f2b8e7e0; padding: 10px; box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.1); }
    .navegacion a { text-decoration: none; color: #0c0100; font-weight: bold; padding: 6px 12px; border-radius: 6px; }
    .navegacion a:hover { background-color: #ff004875; color: black; }
    .juegos { display: flex; flex-direction: column; align-items: center; gap: 25px; margin-top: 40px; }
    .fila { display: flex; flex-wrap: wrap; gap: 25px; justify-content: center; }
    .targeta { width: 160px; cursor: pointer; transition: transform 0.3s ease; border: 4px solid #FFF; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: white; }
    .targeta:hover { transform: scale(1.08); }
    .footer { margin-top: 50px; background-color: #aadbfc; text-align: center; padding: 15px; font-size: 14px; color: #333; border-top: 3px solid #FFD966; }
  </style>
</head>
<body>
  <img src="imagenes/LOGO.png" alt="logo"
       style="position: absolute; left: 110px; top: 65%; transform: translateY(-50%); width: 300px; cursor: pointer;"
       onclick="location.href='juegos.php'">

  <header>
    <div class="header-contenido">
      <div class="logo">
        <img src="imagenes/panda.png" alt="Logo MC">
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
            <a href="login.html"><img src="imagenes/sesion.png" alt="Iniciar sesión"></a>
        <?php endif; ?>
      </div>
    </div>
    <nav class="navegacion">
      <a href="canciones.php">Canciones</a>
      <a href="cuentos.php">Cuentos</a>
      <a href="adivinanzas.php">Adivinanzas</a>
    </nav>
  </header>

  <main class="juegos">
    <div class="fila">
      <img src="imagenes/piano.jpg" alt="Juego 1" class="targeta" onclick="irAJuego('piano.php')">
      <img src="imagenes/memorama.jpg" alt="Juego 2" class="targeta" onclick="irAJuego('memorama.php')">
      <img src="imagenes/rompecabezas.jpg" alt="Juego 3" class="targeta" onclick="irAJuego('rompecabezas.php')">
    </div>
    <div class="fila">
      <img src="imagenes/gato.jpg" alt="Juego 4" class="targeta" onclick="irAJuego('gato.php')">
      <img src="imagenes/paint.jpg" alt="Juego 5" class="targeta" onclick="irAJuego('pintar.php')">
    </div>
  </main>

  <footer class="footer">
    <p>© 2025 Mundo Creativo | Juegos, cuentos y diversión educativa para niños creativos.</p>
  </footer>

  <script>
    function irAJuego(pagina) {
      window.location.href = pagina;
    }
  </script>
</body>
</html>