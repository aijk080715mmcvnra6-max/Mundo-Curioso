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

<meta charset="UTF-8">

<title>Juego del Memorama</title>

<link rel="stylesheet" href="CSS/memorama.css">

</head>


<body>


<header>

    <div class="header-contenido">


        <div class="logo">

            <img src="imagenes/panda.png" alt="Logo panda">

        </div>



        <div class="titulo">

            <h1>Mundo Creativo</h1>

            <p>Descubre, Crea y Juega</p>

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


                <a href="index.html">

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





<!-- LOGO ORIGINAL PARA VOLVER A JUEGOS -->

<img src="imagenes/LOGO.png" 
     alt="logo"
     class="logo-juegos"
     onclick="location.href='juegos.php'">







<div class="container">


    <div id="cabecera">


        <p>

            <span class="m">M</span>
            <span class="e">E</span>
            <span class="m2">M</span>
            <span class="o">O</span>
            <span class="r">R</span>
            <span class="a">A</span>
            <span class="m3">M</span>
            <span class="a2">A</span>

        </p>


    </div>






    <div class="memorama">


        <section class="section1">


            <h1 class="subt">
                MEMORAMA DE ANIMALES
            </h1>



            <h3 id="mensaje"></h3>

            <h3 id="mensaje2"></h3>





            <table>


                <tr>

                    <td>
                        <button id="0" onclick="voltear(0)"></button>
                    </td>


                    <td>
                        <button id="1" onclick="voltear(1)"></button>
                    </td>


                    <td>
                        <button id="2" onclick="voltear(2)"></button>
                    </td>


                    <td>
                        <button id="3" onclick="voltear(3)"></button>
                    </td>


                </tr>





                <tr>

                    <td>
                        <button id="4" onclick="voltear(4)"></button>
                    </td>


                    <td>
                        <button id="5" onclick="voltear(5)"></button>
                    </td>


                    <td>
                        <button id="6" onclick="voltear(6)"></button>
                    </td>


                    <td>
                        <button id="7" onclick="voltear(7)"></button>
                    </td>


                </tr>





                <tr>

                    <td>
                        <button id="8" onclick="voltear(8)"></button>
                    </td>


                    <td>
                        <button id="9" onclick="voltear(9)"></button>
                    </td>


                    <td>
                        <button id="10" onclick="voltear(10)"></button>
                    </td>


                    <td>
                        <button id="11" onclick="voltear(11)"></button>
                    </td>


                </tr>





                <tr>

                    <td>
                        <button id="12" onclick="voltear(12)"></button>
                    </td>


                    <td>
                        <button id="13" onclick="voltear(13)"></button>
                    </td>


                    <td>
                        <button id="14" onclick="voltear(14)"></button>
                    </td>


                    <td>
                        <button id="15" onclick="voltear(15)"></button>
                    </td>


                </tr>


            </table>



        </section>







        <section class="section2">


            <h2 id="tiempo">
                Tiempo: 30 segundos
            </h2>



            <h2 id="puntos">
                Puntos: 0/100
            </h2>



        </section>



    </div>






    <button id="reiniciar" 
            onclick="location.reload()"
            style="visibility:hidden;">

        Reiniciar

    </button>



</div>







<footer class="footer">


<p>

© 2025 Mundo Creativo | Juegos, cuentos y diversión educativa para niños creativos.

</p>


</footer>





<script src="JavaScript/memorama.js"></script>


</body>

</html>