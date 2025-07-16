<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial;
            background: #e9ebee;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            width: 300px;
        }
        input {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
        }
        input[type="submit"] {
            background-color: #1877f2;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <form class="login-box" action="validar_login.php" method="POST">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
<input type="password" name="contrasena" placeholder="Contraseña" required>        <input type="submit" value="Entrar">
    </form>
</body>
</html>