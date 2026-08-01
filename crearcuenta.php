<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexion.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $confirmar = $_POST['confirmar'];

    if($password !== $confirmar){
        echo "<script>alert('Las contraseñas no coinciden.'); window.location.href='crearcuenta.html';</script>";
        exit;
    }

    $clave_encriptada = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $conexion->prepare("INSERT INTO USUARIOS (NOMBRE, CORREO, USUARIO, PASSWORD) VALUES (?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Error en la base de datos: " . $conexion->error);
    }
    
    $stmt->bind_param("ssss", $nombre, $correo, $usuario, $clave_encriptada);

    if($stmt->execute()){
        echo "<script>alert('¡Aventura preparada! Tu cuenta fue creada con éxito.'); window.location.href='login.html';</script>";
    } else {
        echo "<script>alert('Error: El nombre de usuario o correo ya están registrados.'); window.location.href='crearcuenta.html';</script>";
    }
} else {
    echo "<h1>Acceso Denegado</h1><p>Por favor, usa el formulario para registrarte.</p>";
}
?>