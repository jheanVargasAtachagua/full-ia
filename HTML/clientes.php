<?php
// clientes.php
require_once __DIR__ . '/config/db.php';

// Obtener personas para mostrar en la tabla
$sql = "SELECT * FROM personas ORDER BY nombre";
$stmt = $pdo->query($sql);
$personas = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clientes · CrediPanel</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <div class="app-shell">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="brand">
        <div class="brand-logo">CP</div>
        <div class="brand-title">
          <span>CrediPanel</span>
          <span>Deudas & Préstamos</span>
        </div>
      </div>

      <nav>
        <p class="nav-section-title">Principal</p>
        <ul class="nav-list">
          <li class="nav-item"><a href="index.php"><span class="icon">📊</span><span>Dashboard</span></a></li>
          <li class="nav-item active"><a href="clientes.php"><span class="icon">👤</span><span>Clientes</span></a></li>
          <li class="nav-item"><a href="prestamos.php"><span class="icon">💳</span><span>Préstamos</span></a></li>
          <li class="nav-item"><a href="calendario.php"><span class="icon">📅</span><span>Calendario de pagos</span></a></li>
        </ul>

        <p class="nav-section-title">Riesgo</p>
        <ul class="nav-list">
          <li class="nav-item"><a href="cartera.php"><span class="icon">📈</span><span>Cartera por vencer</span></a></li>
          <li class="nav-item"><a href="morosidad.php"><span class="icon">⚠️</span><span>Morosidad</span></a></li>
        </ul>
      </nav>
    </aside>

    <!-- Main -->
    <main class="main">
      <header class="main-header">
        <div class="title-block">
          <h1>Gestión de clientes</h1>
          <p>Registra y administra los datos de tus clientes.</p>
        </div>
      </header>

      <section class="grid-single">
        <div class="card">
          <div class="card-header">
            <div>
              <div class="card-title">Nuevo cliente</div>
              <div class="card-subtitle">Datos básicos de la persona o empresa.</div>
            </div>
          </div>

          <!-- FORMULARIO HTML VINCULADO CON PHP -->
          <form class="form-grid" action="personas_guardar.php" method="POST">
            <div class="field">
              <label for="cliNombre">Nombre completo</label>
              <input id="cliNombre" name="nombre" type="text" placeholder="Nombre y apellidos" required />
            </div>
            <div class="field">
              <label for="cliDocumento">Documento</label>
              <input id="cliDocumento" name="documento" type="text" placeholder="DNI / RUC" />
            </div>
            <div class="field">
              <label for="cliTelefono">Teléfono</label>
              <input id="cliTelefono" name="telefono" type="text" placeholder="Celular / Fijo" />
            </div>
            <div class="field">
              <label for="cliEmail">Email</label>
              <input id="cliEmail" name="email" type="email" placeholder="correo@ejemplo.com" />
            </div>

            <button type="submit" class="btn-primary">
              + Registrar cliente
            </button>
          </form>

          <!-- TABLA HTML RELLENADA CON PHP -->
          <div class="table-wrapper" style="margin-top:16px;">
            <div class="scroll-body">
              <table>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($personas as $p): ?>
                    <tr>
                      <td><?= $p['id']; ?></td>
                      <td><?= htmlspecialchars($p['nombre']); ?></td>
                      <td><?= htmlspecialchars($p['documento']); ?></td>
                      <td><?= htmlspecialchars($p['telefono']); ?></td>
                      <td><?= htmlspecialchars($p['email']); ?></td>
                      <td>
                        <a href="prestamos.php?id_persona=<?= $p['id']; ?>">Nuevo préstamo</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </main>
  </div>

  <script src="js/app.js"></script>
</body>
</html>