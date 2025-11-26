// Datos en memoria (demo)
window.DP = {
  clientes: [],
  movimientos: []
};

// Utilidad
function formatearMoneda(v) {
  return "S/ " + Number(v).toFixed(2);
}

// Inicializar según la página
document.addEventListener("DOMContentLoaded", () => {
  const path = window.location.pathname;

  if (path.endsWith("clientes.html")) {
    initClientes();
  } else if (path.endsWith("prestamos.html")) {
    initPrestamos();
  } else if (path.endsWith("index.html") || path.endsWith("/")) {
    initDashboard();
  } else if (path.endsWith("calendario.html")) {
    initCalendario();
  } else if (path.endsWith("cartera.html")) {
    initCartera();
  } else if (path.endsWith("morosidad.html")) {
    initMorosidad();
  }
});

function initClientes() {
  const tbody = document.getElementById("tbodyClientes");
  const btn = document.getElementById("btnAgregarCliente");

  btn.addEventListener("click", () => {
    const nombre = document.getElementById("cliNombre").value.trim();
    const doc = document.getElementById("cliDocumento").value.trim();
    const tel = document.getElementById("cliTelefono").value.trim();
    const correo = document.getElementById("cliEmail").value.trim();

    if (!nombre || !doc) {
      alert("Nombre y documento son obligatorios.");
      return;
    }

    DP.clientes.push({ nombre, doc, tel, correo });
    renderClientes(tbody);
  });

  renderClientes(tbody);
}

function renderClientes(tbody) {
  tbody.innerHTML = "";
  DP.clientes.forEach(c => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${c.nombre}</td>
      <td>${c.doc}</td>
      <td>${c.tel || "-"}</td>
      <td>${c.correo || "-"}</td>
    `;
    tbody.appendChild(tr);
  });
}

function initPrestamos() {
  const tbody = document.getElementById("tbodyMovimientos");
  const btn = document.getElementById("btnAgregarMovimiento");

  btn.addEventListener("click", () => {
    const cliente = document.getElementById("movCliente").value.trim();
    const monto = parseFloat(document.getElementById("movMonto").value);
    const tipo = document.getElementById("movTipo").value;
    const fecha = document.getElementById("movFecha").value;
    const estado = document.getElementById("movEstado").value;
    const detalle = document.getElementById("movDetalle").value.trim();

    if (!cliente || !monto || !fecha) {
      alert("Completa Cliente, Monto y Fecha.");
      return;
    }

    DP.movimientos.push({ cliente, monto, tipo, fecha, estado, detalle });
    renderMovimientos(tbody);
  });

  renderMovimientos(tbody);
}

function renderMovimientos(tbody) {
  tbody.innerHTML = "";
  DP.movimientos.forEach(m => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${m.cliente}</td>
      <td>${m.tipo === "prestamo" ? "Préstamo" : "Pago"}</td>
      <td>${formatearMoneda(m.monto)}</td>
      <td>${m.fecha}</td>
      <td>${m.estado}</td>
      <td>${m.detalle || "-"}</td>
    `;
    tbody.appendChild(tr);
  });
}

function initDashboard() {
  // lee DP.movimientos y calcula totales como en el ejemplo anterior
}

function initCalendario() {
  // filtra DP.movimientos por fecha de vencimiento (si decides agregar ese campo)
}

function initCartera() {
  // filtra pendientes próximos a vencer
}

function initMorosidad() {
  // filtra atrasados y calcula porcentaje de morosidad
}
