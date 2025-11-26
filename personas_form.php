<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nueva persona</title>
</head>
<body>
<h1>Nueva persona</h1>

<form method="post" action="personas_guardar.php">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Documento:</label>
    <input type="text" name="documento"><br><br>

    <label>Teléfono:</label>
    <input type="text" name="telefono"><br><br>

    <label>Email:</label>
    <input type="email" name="email"><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="personas_listar.php">Volver a la lista</a> | <a href="index.php">Volver al Menú Principal</a>
</body>
</html>