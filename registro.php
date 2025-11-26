<?php
// registro.php
// Aquí puedes incluir tu código de manejo de errores si el script registro_guardar.php
// te redirige de vuelta con un mensaje de error.
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
    <style>
        /* ESTILOS REPETIDOS DEL LOGIN (idealmente en un archivo CSS externo) */
        :root {
            --color-primary: #004a92;
            --color-secondary: #008080;
            --color-background: #f4f6f9;
            --color-text: #2c3e50;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--color-background);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 30px 0;
        }
        
        .registro-card {
            width: 100%;
            max-width: 450px;
            padding: 40px;
            background-color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        
        .registro-card h1 {
            color: var(--color-primary);
            font-size: 1.8em;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--color-secondary);
            padding-bottom: 10px;
        }
        
        /* Estilos de Campos de Formulario */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--color-text);
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            border-color: var(--color-secondary);
            outline: none;
            box-shadow: 0 0 5px rgba(0, 128, 128, 0.3);
        }

        /* Botón Principal */
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: var(--color-secondary); /* Color de acción */
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 10px;
        }
        .btn-submit:hover {
            background-color: #006666;
        }

        /* Enlaces secundarios */
        .secondary-links {
            margin-top: 25px;
            font-size: 0.9em;
        }
        .secondary-links a {
            color: var(--color-primary);
            text-decoration: none;
            transition: color 0.3s;
        }
        .secondary-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="registro-card">
        
        <a href="index.html" class="system-logo" style="color: var(--color-primary); text-decoration: none; font-size: 1.5em; font-weight: 700; display: block; margin-bottom: 15px;">
            Registro de Cuenta
        </a>
        
        <h1>📝 Crear cuenta</h1>

        <form method="post" action="registro_guardar.php">
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-submit">
                REGISTRARSE
            </button>
        </form>
        
        <div class="secondary-links">
            ¿Ya tienes cuenta? <a href="login.php">Iniciar Sesión</a>
            <br>
            <a href="index.html" style="margin-top: 5px; display: inline-block;">Volver al Inicio</a>
        </div>
        
    </div>

</body>
</html>