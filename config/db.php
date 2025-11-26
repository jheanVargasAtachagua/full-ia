<?php
// config/db.php

$host   = "localhost";        // o la IP de tu servidor MySQL
$dbname = "finanzas_db";      // nombre de tu base de datos
$user   = "root";             // usuario de MySQL
$pass   = "";                 // contraseña de MySQL

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass
    );
    // Modo de errores: excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Fetch por defecto: array asociativo
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En producción NO muestres el mensaje completo
    die("Error de conexión a la base de datos.");
}
