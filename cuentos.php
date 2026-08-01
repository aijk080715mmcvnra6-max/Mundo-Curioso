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

<title>Peke Kamp - Cuentos</title>

<link rel="stylesheet" href="CSS/cuentos.css">

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







<!-- LOGO ORIGINAL PARA REGRESAR A JUEGOS -->


<img src="imagenes/logo.png" 
     alt="logo"
     class="logo-juegos"
     onclick="location.href='juegos.php'">








<div class="juegos" id="menu">



<div class="fila">


<img src="imagenes/cuento1.jpg"
alt="Teresa y El Girasol"
class="targeta"
onclick="mostrar('imagenes/cuento1.jpg')">



<img src="imagenes/cocodrilo.jpg"
alt="Kiko El Gallo Soñador"
class="targeta"
onclick="mostrar('imagenes/cocodrilo.jpg')">



<img src="imagenes/pajarito.jpg"
alt="Luna, La Oveja Suavecita"
class="targeta"
onclick="mostrar('imagenes/pajarito.jpg')">



</div>







<div class="fila">


<img src="imagenes/raton.jpg"
alt="Lia, La Jirafa Alta"
class="targeta"
onclick="mostrar('imagenes/raton.jpg')">



<img src="imagenes/roman.jpg"
alt="Toby, El Amigo Fiel"
class="targeta"
onclick="mostrar('imagenes/roman.jpg')">



</div>



</div>









<div id="ver">


<img id="imgGrande" src="">



<a id="cerrar" onclick="regresar()">

×

</a>



</div>








<footer class="footer">


<p>

© 2025 Mundo Curioso | Juegos, cuentos y diversión educativa para niños creativos.

</p>


</footer>







<script src="JavaScript/cuentos.js"></script>


</body>

</html>