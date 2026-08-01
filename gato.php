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

<title>Gato vs Ratón | Peke Kamp</title>

<link rel="stylesheet" href="CSS/gato_raton.css">

</head>


<body>



<header>


<div class="header-contenido">


    <div class="logo">

        <img src="imagenes/panda.png" alt="Logo Peke Kamp">

    </div>



    <div class="titulo">

        <h1>Mundo Curioso</h1>

        <p>Juego de Gato VS Ratón</p>

    </div>




    <div class="login">


        <?php if(isset($_SESSION['nombre'])): ?>


            <span>
                ¡Hola, <?= $_SESSION['nombre']; ?>!
            </span>


            <br>


            <a href="logout.php">
                Cerrar sesión
            </a>



        <?php else: ?>


            <a href=" index.html">

                <img src="imagenes/sesion.png" 
                alt="Iniciar sesión">

            </a>


        <?php endif; ?>


    </div>



</div>





<nav class="navegacion">


    <a href="canciones.php">
        Canciones
    </a>


    <a href="cuentos.php">
        Cuentos
    </a>


    <a href="adivinanzas.php">
        Adivinanzas
    </a>


    <a href="juegos.php">
        Volver a Juegos
    </a>


</nav>



</header>






<div class="caja">


<h2>
🐱 Gato vs Ratón 🐭
</h2>



<div id="mensaje">
Turno de: 🐱
</div>




<div class="tablero" id="tablero">

</div>





<div class="puntos">


<div>
🐱 
<span id="gato">0</span>
</div>



<div>
🐭 
<span id="raton">0</span>
</div>


</div>




<button class="reiniciar">

Reiniciar

</button>



</div>








<footer class="footer">


© 2025 Mundo Curioso | Juegos, cuentos y diversión educativa


</footer>






<script src="JavaScript/gato_raton.js"></script>


</body>

</html>