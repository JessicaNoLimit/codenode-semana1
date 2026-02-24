// Espera a que cargue el HTML
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("budgetForm");
  const msgBox = document.getElementById("frontendMsg");

  if (!form) return;

  form.addEventListener("submit", (event) => {
    // 1) Leer valores y limpiar espacios
    const nombre = form.nombre.value.trim();
    const email = form.email.value.trim();
    const ciudad = form.ciudad.value.trim();
    const servicio = form.servicio.value.trim();

    // 2) Validar obligatorios
    if (nombre === "" || email === "" || ciudad === "" || servicio === "") {
      event.preventDefault(); // frena el envío
      showMsg("⚠️ Completa los campos obligatorios (Nombre, Email, Ciudad y Servicio).");
      return;
    }

    // 3) Validar email con una comprobación simple
    const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    if (!emailOk) {
      event.preventDefault();
      showMsg("⚠️ Escribe un email válido.");
      return;
    }

    // Si todo OK, ocultamos mensaje y dejamos que el formulario se envíe
    hideMsg();
  });

  function showMsg(text) {
    if (!msgBox) {
      alert(text); // fallback si no existe el div
      return;
    }
    msgBox.textContent = text;
    msgBox.style.display = "block";
  }

  function hideMsg() {
    if (!msgBox) return;
    msgBox.style.display = "none";
    msgBox.textContent = "";
  }
});