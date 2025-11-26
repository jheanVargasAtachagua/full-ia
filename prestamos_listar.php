<?php
require_once __DIR__ . '/config/db.php';

$id_persona = (int)($_GET['id_persona'] ?? 0);

if ($id_persona <= 0) {
    die("Persona no válida.");
}

$sql_persona = "SELECT * FROM personas WHERE id = :id";
$stmt_persona = $pdo->prepare($sql_persona);
$stmt_persona->execute([':id' => $id_persona]);
$persona = $stmt_persona->fetch();

if (!$persona) {
    die("Persona no encontrada.");
}

// Obtener préstamos de esa persona
$sql_prestamos = "SELECT * FROM prestamos WHERE id_persona = :id_persona";
$stmt_prestamos = $pdo->prepare($sql_prestamos);
$stmt_prestamos->execute([':id_persona' => $id_persona]);
$prestamos = $stmt_prestamos->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Préstamos de <?php echo htmlspecialchars($persona['nombre']); ?></title>
</head>
<body>
<h1>Préstamos de <?php echo htmlspecialchars($persona['nombre']); ?></h1>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID préstamo</th>
        <th>Monto</th>
        <th>Tasa anual</th>
        <th>Número de cuotas</th>
        <th>Fecha inicio</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($prestamos as $p): ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo number_format($p['monto'], 2); ?></td>
            <td><?php echo $p['tasa_anual']; ?> %</td>
            <td><?php echo $p['numero_cuotas']; ?></td>
            <td><?php echo $p['fecha_inicio']; ?></td>
            <td>
                <a href="prestamos_ver.php?id=<?php echo $p['id']; ?>">Ver cronograma</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="personas_listar.php">Volver a personas</a>
</body>
</html>
