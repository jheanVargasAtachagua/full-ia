<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menú Principal del Sistema</title>
</head>
<body>

    <h1> Menú Principal del Sistema de Préstamos</h1>
    <hr>
    
    <h2> Acceso al Sistema</h2>
    <p>Para ingresar o crear una cuenta:</p>
    <ul>
        <li><a href="login.php">Iniciar Sesión (login.php)</a></li>
        <li><a href="registro.php">Crear Nueva Cuenta (registro.php)</a></li>
    </ul>
    
    <hr>

    <h2>Gestión de Personas / Clientes</h2>
    <ul>
        <li><a href="personas_listar.php">Listar Personas / Clientes</a></li>
        <li><a href="personas_form.php">Registrar Nueva Persona</a></li>
    </ul>

    <h2> Gestión de Préstamos</h2>
    <ul>
        <li><a href="prestamos_form.php">Registrar Nuevo Préstamo</a></li>
        <li><a href="prestamos_listar.php">Listar Préstamos (General)</a></li>
    </ul>
    
    <hr>

    <p>
        **Nota:** Los archivos de procesamiento (como `login_validar.php`, `registro_guardar.php`, y los *_guardar.php) no se enlazan directamente desde el menú.
    </p>

</body>
</html>