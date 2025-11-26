<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nueva entidad</title>
</head>
<body>
<h1>Nueva entidad</h1>

<form method="post" action="personas_guardar.php">
    <label>Tipo:</label>
    <select name="tipo" required>
        <option value="PERSONA">Persona</option>
        <option value="EMPRESA">Empresa</option>
    </select>
    <br><br>

    <label>Nombre / Razón social:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Documento:</label>
    <input type="text" name="documento"><br><br>

    <label>Teléfono:</label>
    <input type="text" name="telefono"><br><br>

    <label>Email:</label>
    <input type="email" name="email"><br><br>

    <button type="submit">Guardar</button>
</form>

</body>
</html>
