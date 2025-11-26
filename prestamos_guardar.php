<?php
require_once __DIR__ . '/config/db.php';

// 1. Recibir y validar datos
$tipo          = $_POST['tipo'] ?? 'CONCEDIDO';
$id_persona    = (int)($_POST['id_persona'] ?? 0);
$monto         = (float)($_POST['monto'] ?? 0);
$tasa_anual    = (float)($_POST['tasa_anual'] ?? 0);
$numero_cuotas = (int)($_POST['numero_cuotas'] ?? 0);
$fecha_inicio  = $_POST['fecha_inicio'] ?? '';

if ($id_persona <= 0 || $monto <= 0 || $numero_cuotas <= 0 || $fecha_inicio === '') {
    die("Datos inválidos del préstamo.");
}

// 2. Insertar préstamo
$sql = "INSERT INTO prestamos (id_persona, tipo, monto, tasa_anual, numero_cuotas, fecha_inicio)
        VALUES (:id_persona, :tipo, :monto, :tasa_anual, :numero_cuotas, :fecha_inicio)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id_persona'    => $id_persona,
    ':tipo'          => $tipo,
    ':monto'         => $monto,
    ':tasa_anual'    => $tasa_anual,
    ':numero_cuotas' => $numero_cuotas,
    ':fecha_inicio'  => $fecha_inicio
]);

$id_prestamo = $pdo->lastInsertId();

// 3. Cálculo sistema francés
$tasa_mensual = ($tasa_anual / 100) / 12;
$P = $monto;
$i = $tasa_mensual;
$n = $numero_cuotas;

if ($i > 0) {
    $cuota = $P * ( $i * pow(1 + $i, $n) ) / ( pow(1 + $i, $n) - 1 );
} else {
    $cuota = $P / $n;
}

$saldo = $P;
$fecha_cuota = new DateTime($fecha_inicio);

// 4. Generar cuotas en la tabla `cuotas`
$sql_cuota = "INSERT INTO cuotas
    (id_prestamo, numero_cuota, fecha_vencimiento, capital, interes, monto_cuota, saldo_restante)
    VALUES
    (:id_prestamo, :numero_cuota, :fecha_vencimiento, :capital, :interes, :monto_cuota, :saldo_restante)";
$stmt_cuota = $pdo->prepare($sql_cuota);

for ($k = 1; $k <= $n; $k++) {

    $interes = $saldo * $i;
    $capital = $cuota - $interes;
    $saldo   = $saldo - $capital;

    $fecha_cuota->modify('+1 month');
    $fecha_vencimiento = $fecha_cuota->format('Y-m-d');

    $stmt_cuota->execute([
        ':id_prestamo'      => $id_prestamo,
        ':numero_cuota'     => $k,
        ':fecha_vencimiento'=> $fecha_vencimiento,
        ':capital'          => round($capital, 2),
        ':interes'          => round($interes, 2),
        ':monto_cuota'      => round($cuota, 2),
        ':saldo_restante'   => round(max($saldo, 0), 2)
    ]);
}

// 5. Redirigir a ver el cronograma
header("Location: prestamos_ver.php?id=$id_prestamo");
exit;
