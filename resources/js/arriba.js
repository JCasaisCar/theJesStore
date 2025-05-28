"use strict";

const volverArriba = document.getElementById('volver-arriba');
  
window.addEventListener('scroll', () => {
  if (window.scrollY > 300) {
    volverArriba.classList.remove('opacity-0', 'invisible');
    volverArriba.classList.add('opacity-100', 'visible');
  } else {
    volverArriba.classList.add('opacity-0', 'invisible');
    volverArriba.classList.remove('opacity-100', 'visible');
  }
});

volverArriba.addEventListener('click', (e) => {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});