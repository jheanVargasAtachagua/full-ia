<?php
session_start();
require_once __DIR__ . '/config/db.php';

$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';

$sql = "SELECT * FROM usuarios WHERE email = :email AND estado = 'ACTIVO'";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email]);
$user = $stmt->fetch();

if ($user && password_verify($pass, $user['password_hash'])) {
    // Guardar datos en sesión
    $_SESSION['id_usuario'] = $user['id'];
    $_SESSION['nombre_usuario'] = $user['nombre'];
    header("Location: personas_listar.php");
    exit;
} else {
    echo "Usuario o contraseña incorrectos. <a href='login.php'>Intentar de nuevo</a>";
}
