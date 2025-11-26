<?php
require_once __DIR__ . '/config/db.php';

$nombre = trim($_POST['nombre'] ?? '');
$email  = trim($_POST['email'] ?? '');
$pass   = $_POST['password'] ?? '';

if ($nombre === '' || $email === '' || $pass === '') {
    die("Completa todos los campos.");
}

// Hashear la contraseña
$hash = password_hash($pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, email, password_hash) VALUES (:nombre, :email, :hash)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':nombre' => $nombre,
        ':email'  => $email,
        ':hash'   => $hash
    ]);
    // Redirige automáticamente al login
    header("Location: login.php");
    exit;
} catch (PDOException $e) {
    echo "Error: " . ($e->getCode() == 23000 ? "Email ya registrado." : "No se pudo registrar.");
}
