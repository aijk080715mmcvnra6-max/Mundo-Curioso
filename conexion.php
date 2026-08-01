<?php
$servidor = "localhost";
$usuario_db = "root";
$password_db = "";
$bd = "pekekamp";

$conexion = new mysqli($servidor, $usuario_db, $password_db, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>