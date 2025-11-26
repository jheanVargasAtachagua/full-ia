<?php
require_once __DIR__ . '/config/db.php';

// Obtener personas para el select
$sql = "SELECT id, nombre FROM personas ORDER BY nombre";
$stmt = $pdo->query($sql);
$personas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nuevo préstamo</title>
</head>
<body>
<h1>Registrar préstamo / deuda</h1>

<form method="post" action="prestamos_guardar.php">
    <label>Tipo de transacción:</label>
    <select name="tipo" required>
        <option value="CONCEDIDO">Préstamo CONCEDIDO (lo das)</option>
        <option value="RECIBIDO">Préstamo RECIBIDO (lo recibes)</option>
    </select>
    <br><br>

    <label>Persona / Empresa:</label>
    <select name="id_persona" required>
        <option value="">-- Seleccione --</option>
        <?php foreach ($personas as $p): ?>
            <option value="<?php echo $p['id']; ?>">
                <?php echo htmlspecialchars($p['nombre']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Monto (S/):</label>
    <input type="number" step="0.01" name="monto" required>
    <br><br>

    <label>Tasa anual (%):</label>
    <input type="number" step="0.01" name="tasa_anual" required>
    <br><br>

    <label>Número de cuotas:</label>
    <input type="number" name="numero_cuotas" required>
    <br><br>

    <label>Fecha inicio:</label>
    <input type="date" name="fecha_inicio" required>
    <br><br>

    <button type="submit">Guardar y generar cronograma</button>
</form>

</body>
</html>
