<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT ID_USUARIO, NOMBRE, PASSWORD FROM USUARIOS WHERE USUARIO = ?");
    
    if ($stmt === false) {
        die("Error en la base de datos al buscar usuario: " . $conexion->error);
    }

    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if($row = $resultado->fetch_assoc()){
        if(password_verify($password, $row['PASSWORD'])){
            $_SESSION['id_usuario'] = $row['ID_USUARIO'];
            $_SESSION['nombre'] = $row['NOMBRE'];
            
            // Redirige directamente a juegos.php
            header("Location: juegos.php");
            exit;
        } else {
            echo "<script>alert('Contraseña incorrecta. ¡Inténtalo de nuevo!'); window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('El usuario no existe en Mundo Curioso.'); window.location.href='index.html';</script>";
    }
} else {
    echo "<h1>Acceso Denegado</h1><p>Por favor, inicia sesión desde la página principal.</p>";
}
?>