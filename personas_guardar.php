<?php
require_once __DIR__ . '/config/db.php';

$nombre    = trim($_POST['nombre'] ?? '');
$documento = trim($_POST['documento'] ?? '');
$telefono  = trim($_POST['telefono'] ?? '');
$email     = trim($_POST['email'] ?? '');

if ($nombre === '') {
    die("El nombre es obligatorio.");
}

$sql = "INSERT INTO personas (nombre, documento, telefono, email)
        VALUES (:nombre, :documento, :telefono, :email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nombre'    => $nombre,
    ':documento' => $documento,
    ':telefono'  => $telefono,
    ':email'     => $email,
]);

header("Location: personas_listar.php");
exit;
