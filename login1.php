<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nombre = $_POST['usuario'];
$contraseña = $_POST['contrasena'];
    $sql = "SELECT * FROM dato WHERE nombre = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        
        if ($contraseña === $usuario['contraseña']) {
            $_SESSION['usuario'] = $usuario['nombre'];
            header("Location: perfil.php");
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
        }
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
    }

    $stmt->close();
    $conexion->close();
    header("Location: login.php");
}
?>