<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <!-- Hace que la página sea responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>🎹 Piano Animalitos</title>

    <link rel="stylesheet" href="CSS/piano.css">
</head>

<body>

    <!-- =======================
            ENCABEZADO
    ======================== -->

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

                <?php if (isset($_SESSION['nombre'])): ?>

                    <span class="usuario">
                        ¡Hola, <?= htmlspecialchars($_SESSION['nombre']); ?>!
                    </span>

                    <br>

                    <a href="logout.php" class="cerrar">
                        Cerrar sesión
                    </a>

                <?php else: ?>

                    <a href="index.html">
                        <img src="imagenes/sesion.png" alt="Iniciar sesión">
                    </a>

                <?php endif; ?>

            </div>

        </div>

        <!-- Menú -->

        <nav class="navegacion">

            <a href="canciones.php"> Canciones</a>

            <a href="cuentos.php"> Cuentos</a>

            <a href="adivinanzas.php"> Adivinanzas</a>

        </nav>

    </header>


    <!-- =======================
            BOTÓN JUEGOS
    ======================== -->

    <img src="imagenes/logo.png"
         class="logo-juegos"
         alt="Juegos"
         onclick="location.href='juegos.php'">


    <!-- =======================
             TÍTULO
    ======================== -->

    <h1 class="tit">

        🎹 ¡El Piano de los Animalitos! 🐾

    </h1>


    <!-- =======================
              PIANO
    ======================== -->

    <div class="piano">

        <button class="key perro" onclick="tocarSonido('perro')">

            <div class="emoji">🐶</div>

            Guau

        </button>

        <button class="key gato" onclick="tocarSonido('gato')">

            <div class="emoji">🐱</div>

            Miau

        </button>

        <button class="key vaca" onclick="tocarSonido('vaca')">

            <div class="emoji">🐮</div>

            Muu

        </button>

        <button class="key oveja" onclick="tocarSonido('oveja')">

            <div class="emoji">🐑</div>

            Beee

        </button>

        <button class="key pato" onclick="tocarSonido('pato')">

            <div class="emoji">🦆</div>

            Cuac

        </button>

        <button class="key leon" onclick="tocarSonido('leon')">

            <div class="emoji">🦁</div>

            Grrr

        </button>

        <button class="key mono" onclick="tocarSonido('mono')">

            <div class="emoji">🐒</div>

            Uuh Ah

        </button>

        <button class="key elefante" onclick="tocarSonido('elefante')">

            <div class="emoji">🐘</div>

            Bruuu

        </button>

    </div>


    <!-- =======================
             PIE DE PÁGINA
    ======================== -->

    <footer class="footer">

        <p>

            © 2025 Mundo Curioso | Juegos, cuentos y diversión educativa para niños.

        </p>

    </footer>


    <!-- =======================
             JAVASCRIPT
    ======================== -->

    <script>

        function tocarSonido(nombreAnimal) {

            const audio = new Audio("sounds/" + nombreAnimal + ".mp3");

            audio.play().catch(error => {

                alert("❌ No se pudo reproducir el sonido de " + nombreAnimal);

                console.error(error);

            });

        }

    </script>

</body>

</html>