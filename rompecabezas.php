<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location:  index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">


    <title>Mundo Curioso| Juego de los Animales</title>

    <link rel="stylesheet" href="CSS/rompecabezas.css">

</head>

<body>

<header>

    <div class="header-contenido">

        <div class="logo">
            <img src="imagenes/panda.png" alt="Logo">
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

</header>

<nav class="navegacion">

    <a href="canciones.php"> Canciones</a>

    <a href="cuentos.php"> Cuentos</a>

    <a href="adivinanzas.php">Adivinanzas</a>

    <a href="juegos.php"> Volver a Juegos</a>

</nav>


<!-- PRESENTACIÓN -->

<section class="inicio">

    <div class="tarjeta">

        <h1>
            🐾 Juego de los Animales 🐾
        </h1>

        <p>

            ¡Bienvenido!

            <br><br>

            Observa con atención cada animal.

            <br>

            Después arrástralo hasta el nombre correcto.

            <br><br>

            ¡Cuando completes todos los animales habrás ganado!

        </p>

        <button class="button" onclick="iniciarJuego()">

            🎮 Comenzar Juego

        </button>

    </div>

</section>



<!-- JUEGO -->

<section id="juego">

    <h2>

        Arrastra cada animal al nombre correcto

    </h2>

    <div class="reinicio">

        <button id="Actualizar" onclick="location.reload()">

            🔄 Reiniciar Juego

        </button>

    </div>
<!-- ANIMALES -->

<div class="contenedor animales">

    <img src="imagenes/jirafa.jpg"
         id="Jirafa"
         draggable="true"
         ondragstart="drag(event)"
         alt="Jirafa">

    <img src="imagenes/elefante.jpg"
         id="Elefante"
         draggable="true"
         ondragstart="drag(event)"
         alt="Elefante">

    <img src="imagenes/pollo.jpg"
         id="Pollo"
         draggable="true"
         ondragstart="drag(event)"
         alt="Pollito">

    <img src="imagenes/oveja.jpg"
         id="Oveja"
         draggable="true"
         ondragstart="drag(event)"
         alt="Oveja">

    <img src="imagenes/mono.jpg"
         id="Mono"
         draggable="true"
         ondragstart="drag(event)"
         alt="Mono">

    <img src="imagenes/leon.jpg"
         id="Leon"
         draggable="true"
         ondragstart="drag(event)"
         alt="León">

</div>



<!-- CAJAS -->

<div class="contenedor figuras">

    <div class="figura">

        <div class="box"
             id="box0"
             ondrop="drop(event)"
             ondragover="allowDrop(event)">
        </div>

        <h3>🐘 Elefante</h3>

    </div>



    <div class="figura">

        <div class="box"
             id="box1"
             ondrop="drop(event)"
             ondragover="allowDrop(event)">
        </div>

        <h3>🐑 Oveja</h3>

    </div>



    <div class="figura">

        <div class="box"
             id="box2"
             ondrop="drop(event)"
             ondragover="allowDrop(event)">
        </div>

        <h3>🦒 Jirafa</h3>

    </div>



    <div class="figura">

        <div class="box"
             id="box3"
             ondrop="drop(event)"
             ondragover="allowDrop(event)">
        </div>

        <h3>🐥 Pollito</h3>

    </div>



    <div class="figura">

        <div class="box"
             id="box4"
             ondrop="drop(event)"
             ondragover="allowDrop(event)">
        </div>

        <h3>🦁 León</h3>

    </div>



    <div class="figura">

        <div class="box"
             id="box5"
             ondrop="drop(event)"
             ondragover="allowDrop(event)">
        </div>

        <h3>🐒 Mono</h3>

    </div>

</div>

</section>



<footer>

    <p>

        © 2026 Mundo Curioso

        <br>

        Aprender jugando es la mejor aventura.

    </p>

</footer>
<script>

// Mostrar el juego
function iniciarJuego(){

    document.querySelector(".inicio").style.display = "none";

    document.getElementById("juego").style.display = "block";

}



// Respuestas correctas
const respuestas = {

    box0: "Elefante",
    box1: "Oveja",
    box2: "Jirafa",
    box3: "Pollo",
    box4: "Leon",
    box5: "Mono"

};


let aciertos = 0;



// Permitir soltar
function allowDrop(event){

    event.preventDefault();

}



// Arrastrar imagen
function drag(event){

    event.dataTransfer.setData("text", event.target.id);

}



// Soltar imagen
function drop(event){

    event.preventDefault();

    const id = event.dataTransfer.getData("text");

    const imagen = document.getElementById(id);

    const caja = event.target.closest(".box");

    if(!caja) return;

    // Evitar colocar dos animales en la misma casilla
    if(caja.children.length > 0){

        alert("⚠️ Esta casilla ya tiene un animal.");

        return;

    }

    // Respuesta correcta
    if(respuestas[caja.id] === id){

        caja.appendChild(imagen);

        imagen.draggable = false;

        imagen.style.cursor = "default";

        imagen.style.transform = "scale(0.9)";

        aciertos++;

        if(aciertos === 6){

            setTimeout(function(){

                alert("🎉 ¡Felicidades!\n\nHas completado correctamente el juego.\n¡Sigue aprendiendo! 🦁🐘🐵");

                document.getElementById("Actualizar").style.display = "inline-block";

            },300);

        }

    }

    // Respuesta incorrecta
    else{

        alert("❌ Ese animal no corresponde a ese nombre.\n¡Inténtalo nuevamente!");

    }

}
// =======================
// SOPORTE PARA CELULARES
// =======================

let animalSeleccionado = null;

// Al tocar un animal
document.querySelectorAll(".animales img").forEach(img => {

    img.addEventListener("touchstart", function () {
        animalSeleccionado = this;
    });

});

// Al soltar el dedo sobre una caja
document.querySelectorAll(".box").forEach(caja => {

    caja.addEventListener("touchend", function () {

        if (!animalSeleccionado) return;

        // Si la caja ya tiene un animal
        if (this.children.length > 0) {

            alert("⚠️ Esta casilla ya tiene un animal.");
            animalSeleccionado = null;
            return;

        }

        // Verificar respuesta
        if (respuestas[this.id] === animalSeleccionado.id) {

            this.appendChild(animalSeleccionado);

            animalSeleccionado.draggable = false;
            animalSeleccionado.style.cursor = "default";
            animalSeleccionado.style.transform = "scale(0.9)";

            aciertos++;

            if (aciertos === 6) {

                setTimeout(function () {

                    alert("🎉 ¡Felicidades!\n\nHas completado correctamente el juego.\n¡Sigue aprendiendo!");

                    document.getElementById("Actualizar").style.display = "inline-block";

                }, 300);

            }

        } else {

            alert("❌ Ese animal no corresponde a ese nombre.");

        }

        animalSeleccionado = null;

    });

});
</script>

</body>
</html>