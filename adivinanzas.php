<?php
session_start();
if(!isset($_SESSION['id_usuario'])){
    header("Location:  index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portal de Cuentos - Mundo Curioso</title>

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/adivinanzas.css">
</head>

<body>

    <!-- ================= HEADER ================= -->

    <header>

        <div class="header-contenido">

            <div class="logo">
                <img src="imagenes/panda.png" alt="Logo Mundo Curioso">
            </div>

            <div class="titulo">
                <h1>Mundo Curioso</h1>
                <p>¡Descubre, Crea y Juega!</p>
            </div>

            <div class="login">

                <?php if(isset($_SESSION['nombre'])): ?>

                    <span class="usuario">
                        ¡Hola, <?= $_SESSION['nombre']; ?>!
                    </span>

                    <br>

                    <a href="logout.php" class="cerrar">
                        Cerrar sesión
                    </a>

                <?php else: ?>

                    <a href=" index.html">
                        <img src="imagenes/sesion.png" alt="Iniciar sesión">
                    </a>

                <?php endif; ?>

            </div>

        </div>

        <nav class="navegacion">

            <a href="canciones.php">Canciones</a>

            <a href="cuentos.php">Cuentos</a>

            <a href="adivinanzas.php">Adivinanzas</a>

        </nav>

    </header>

    <!-- ================= BOTÓN JUEGOS ================= -->

    <img
        src="imagenes/logo.png"
        alt="Juegos"
        class="logo-juegos"
        onclick="location.href='juegos.php'">

    <!-- ================= CUENTOS ================= -->

    <div class="juegos" id="menu">

        <div class="fila">

            <img
                src="imagenes/loro.jpg"
                alt="Loro"
                class="targeta"
                onclick="mostrar('imagenes/loro.jpg')">

            <img
                src="imagenes/tortuga.jpg"
                alt="Tortuga"
                class="targeta"
                onclick="mostrar('imagenes/tortuga.jpg')">

            <img
                src="imagenes/delfin.jpg"
                alt="Delfín"
                class="targeta"
                onclick="mostrar('imagenes/delfin.jpg')">

        </div>

        <div class="fila">

            <img
                src="imagenes/canguro.jpg"
                alt="Canguro"
                class="targeta"
                onclick="mostrar('imagenes/canguro.jpg')">

            <img
                src="imagenes/foca.jpg"
                alt="Foca"
                class="targeta"
                onclick="mostrar('imagenes/foca.jpg')">

        </div>

    </div>
    <!-- ================= VISTA DEL CUENTO ================= -->

    <div id="ver">

        <img id="imgGrande" src="" alt="Cuento">

        <a id="cerrar" onclick="regresar()">×</a>

    </div>

    <!-- ================= FOOTER ================= -->

    <footer class="footer">

        <p>
            © 2025 Mundo Curioso | Juegos, cuentos y diversión educativa para niños creativos.
        </p>

    </footer>

    <!-- ================= JAVASCRIPT ================= -->

    <script>

        function mostrar(ruta){

            document.getElementById("menu").style.display = "none";

            document.getElementById("imgGrande").src = ruta;

            document.getElementById("ver").style.display = "block";

        }

        function regresar(){

            document.getElementById("ver").style.display = "none";

            document.getElementById("menu").style.display = "flex";

        }

    </script>

</body>
</html>