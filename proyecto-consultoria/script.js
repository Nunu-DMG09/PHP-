// PARA EL SCROL DE MI NAVEGACION
window.addEventListener("scroll", function () {
      const navbar = document.getElementById("mainNavbar");
      if (window.scrollY > 50) {
        navbar.classList.add("shrink");
      } else {
        navbar.classList.remove("shrink");
      }
    });
