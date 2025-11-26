<?php
// login.php
// Aquí puedes incluir tu código de manejo de errores si el script login_validar.php
// te redirige de vuelta con un mensaje de error (ej: ?error=1)
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Plataforma Segura</title>
    <style>
        /* Variables de Color del estilo empresarial */
        :root {
            --color-primary: #004a92; /* Azul Corporativo Oscuro */
            --color-secondary: #008080; /* Teal/Verde de Acción */
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
        }
        
        /* Contenedor del Formulario (La "Tarjeta") */
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background-color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        
        .login-card h1 {
            color: var(--color-primary);
            font-size: 1.8em;
            margin-bottom: 30px;
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
        .form-group input[type="email"],
        .form-group input[type="password"] {
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
            background-color: var(--color-primary);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 700;
            text-transform: uppercase;
        }
        .btn-submit:hover {
            background-color: #003366; 
        }

        /* Enlaces secundarios */
        .secondary-links {
            margin-top: 25px;
            font-size: 0.9em;
        }
        .secondary-links a {
            color: var(--color-secondary);
            text-decoration: none;
            transition: color 0.3s;
        }
        .secondary-links a:hover {
            color: var(--color-primary);
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-card">
        
        <a href="index.html" class="system-logo" style="color: var(--color-primary); text-decoration: none; font-size: 1.5em; font-weight: 700; display: block; margin-bottom: 15px;">
            Plataforma Financiera
        </a>
        
        <h1>🔑 Iniciar sesión</h1>
        
        <form method="post" action="login_validar.php">
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-submit">
                INGRESAR
            </button>
            
        </form>
        
        <div class="secondary-links">
            ¿No tienes cuenta? <a href="registro.php">Crea una aquí</a>
            <br>
            <a href="index.html" style="margin-top: 5px; display: inline-block;">Volver al Inicio</a>
        </div>
        
    </div>

</body>
</html>