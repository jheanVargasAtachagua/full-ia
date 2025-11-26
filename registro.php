<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registro de usuario</title>
</head>
<body>
<h1>Crear cuenta</h1>

<form method="post" action="registro_guardar.php">
  <label>Nombre:</label>
  <input type="text" name="nombre" required><br><br>

  <label>Email:</label>
  <input type="email" name="email" required><br><br>

  <label>Contraseña:</label>
  <input type="password" name="password" required><br><br>

  <button type="submit">Registrarse</button>
</form>
</body>
</html>
