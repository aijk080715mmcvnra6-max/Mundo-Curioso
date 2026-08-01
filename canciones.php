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

<title>Peke Kamp - Videos Musicales</title>

<link rel="stylesheet" href="CSS/canciones.css">

</head>


<body>


<header>


<div class="header-contenido">


    <div class="logo">

        <img src="imagenes/panda.png" alt="Logo Peke Kamp">

    </div>




    <div class="titulo">

        <h1>Mundo Curioso</h1>

        <p>
            ¡Descubre, Crea y Juega!
        </p>

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


</nav>


</header>





<!-- LOGO PARA VOLVER A JUEGOS -->


<img src="imagenes/logo.png"
     alt="logo"
     class="logo-juegos"
     onclick="location.href='juegos.php'">







<div class="juegos" id="menu">



<div class="fila">


<img src="imagenes/abecedario.jpg"
     alt="video1"
     class="targeta"
     onclick="mostrar('videos/Abecedario.mp4')">



<img src="imagenes/juan.jpg"
     alt="video2"
     class="targeta"
     onclick="mostrar('videos/juan.mp4')">



<img src="imagenes/pollito.jpg"
     alt="video3"
     class="targeta"
     onclick="mostrar('videos/pollito.mp4')">


</div>





<div class="fila">


<img src="imagenes/vaca lola.jpg"
     alt="video4"
     class="targeta"
     onclick="mostrar('videos/La Vaca Lola.mp4')">



<img src="imagenes/vocales.jpg"
     alt="video5"
     class="targeta"
     onclick="mostrar('videos/La Risa De Las Vocales.mp4')">


</div>



</div>








<div id="ver">


<video id="videoGrande" controls autoplay></video>


<a id="cerrar" onclick="regresar()">
×
</a>



</div>






<footer class="footer">


<p>

© 2025 Mundo Curioso | Juegos, cuentos y diversión educativa para niños creativos.

</p>


</footer>







<script src="JavaScript/canciones.js"></script>


</body>

</html>