<?php
require_once __DIR__ . '/config/db.php';

$sql = "SELECT * FROM personas ORDER BY nombre";
$stmt = $pdo->query($sql);
$personas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Personas / Empresas</title>
</head>
<body>
<h1>Personas / Empresas</h1>

<a href="personas_form.php">Nueva persona/empresa</a>
<br><br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Nombre / Razón social</th>
        <th>Documento</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($personas as $p): ?>
        <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo htmlspecialchars($p['tipo']); ?></td>
            <td><?php echo htmlspecialchars($p['nombre']); ?></td>
            <td><?php echo htmlspecialchars($p['documento']); ?></td>
            <td><?php echo htmlspecialchars($p['telefono']); ?></td>
            <td><?php echo htmlspecialchars($p['email']); ?></td>
            <td>
                <a href="prestamos_form.php?id_persona=<?php echo $p['id']; ?>">
                    Nuevo préstamo
                </a>
                |
                <a href="prestamos_listar.php?id_persona=<?php echo $p['id']; ?>">
                    Ver préstamos
                </a>

            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
