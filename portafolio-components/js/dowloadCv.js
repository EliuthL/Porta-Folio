function downloadCV() {
  const link = document.createElement("a");
  link.href = "../documents/cv.pdf"; 
  link.download = "CV_Wilber Eliuth López.pdf";
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

function menuToggle() {
  const menu = document.getElementById("menu");
  menu.classList.toggle("hidden");
}

function copyEmail() {
    const email = "eliuthsevilla@gmail.com";
    const copyIcon = document.getElementById("copyIcon");
    const checkIcon = document.getElementById("checkIcon");

    // copiar al portapapeles
    navigator.clipboard.writeText(email).then(() => {
      // Ocultar icono de copiar y mostrar check
      copyIcon.classList.add("opacity-0");
      checkIcon.classList.remove("opacity-0");

      // Después de 2 segundos, volver al estado original
      setTimeout(() => {
        checkIcon.classList.add("opacity-0");
        copyIcon.classList.remove("opacity-0");
      }, 2000);
    });
  }