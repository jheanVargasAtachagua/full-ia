<?php
require_once __DIR__ . '/config/db.php';

$id_prestamo = (int)($_GET['id'] ?? 0);
if ($id_prestamo <= 0) {
    die("Préstamo no válido.");
}

// Obtener préstamo + persona
$sql_p = "SELECT p.*, per.nombre 
          FROM prestamos p
          JOIN personas per ON p.id_persona = per.id
          WHERE p.id = :id";
$stmt_p = $pdo->prepare($sql_p);
$stmt_p->execute([':id' => $id_prestamo]);
$prestamo = $stmt_p->fetch();

if (!$prestamo) {
    die("Préstamo no encontrado.");
}

// Obtener cuotas
$sql_c = "SELECT * FROM cuotas WHERE id_prestamo = :id_p ORDER BY numero_cuota";
$stmt_c = $pdo->prepare($sql_c);
$stmt_c->execute([':id_p' => $id_prestamo]);
$cuotas = $stmt_c->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cronograma de préstamo</title>
</head>
<body>
<h1>Cronograma de préstamo</h1>

<p>
    Persona: <?php echo htmlspecialchars($prestamo['nombre']); ?><br>
    Monto: S/ <?php echo number_format($prestamo['monto'], 2); ?><br>
    Tasa anual: <?php echo $prestamo['tasa_anual']; ?> %<br>
    Número de cuotas: <?php echo $prestamo['numero_cuotas']; ?><br>
    Fecha inicio: <?php echo $prestamo['fecha_inicio']; ?>
</p>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>N° cuota</th>
        <th>Fecha vencimiento</th>
        <th>Capital</th>
        <th>Interés</th>
        <th>Monto cuota</th>
        <th>Saldo restante</th>
    </tr>
    <?php foreach ($cuotas as $c): ?>
        <tr>
            <td><?php echo $c['numero_cuota']; ?></td>
            <td><?php echo $c['fecha_vencimiento']; ?></td>
            <td><?php echo number_format($c['capital'], 2); ?></td>
            <td><?php echo number_format($c['interes'], 2); ?></td>
            <td><?php echo number_format($c['monto_cuota'], 2); ?></td>
            <td><?php echo number_format($c['saldo_restante'], 2); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="prestamos_form.php">Registrar otro préstamo</a>
<br>
<a href="personas_listar.php">Volver a personas</a>

</body>
</html>
