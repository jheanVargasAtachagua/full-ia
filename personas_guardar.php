<?php
require_once __DIR__ . '/config/db.php';

$tipo      = $_POST['tipo'] ?? 'PERSONA';
$nombre    = trim($_POST['nombre'] ?? '');
$documento = trim($_POST['documento'] ?? '');
$telefono  = trim($_POST['telefono'] ?? '');
$email     = trim($_POST['email'] ?? '');

if ($nombre === '') {
    die("El nombre / razón social es obligatorio.");
}

$sql = "INSERT INTO personas (tipo, nombre, documento, telefono, email)
        VALUES (:tipo, :nombre, :documento, :telefono, :email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':tipo'      => $tipo,
    ':nombre'    => $nombre,
    ':documento' => $documento,
    ':telefono'  => $telefono,
    ':email'     => $email,
]);

header("Location: personas_listar.php");
exit;
