// Codigo que maneja las animaciones y transformaciones de botones e imagenes en el home

function toggleMenu() {
  const menu = document.getElementById('auth-menu'); // Obtiene el menú de autenticación
  const menuIcon = document.getElementById('menu-icon').firstElementChild; // Obtiene el ícono del menú (el elemento <i>)

  // Alterna la visibilidad del menú
  menu.classList.toggle('hidden');

  // Alterna entre el ícono de menú y el de "X"
  if (menuIcon.classList.contains('fa-bars')) {
    menuIcon.classList.remove('fa-bars');
    menuIcon.classList.add('fa-times');
  } else {
    menuIcon.classList.remove('fa-times');
    menuIcon.classList.add('fa-bars');
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const elements = document.querySelectorAll('.animate');

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  });

  elements.forEach(element => {
    observer.observe(element);
  });
});
