<<<<<<< HEAD
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
=======
import '../scss/app.scss'
import * as bootstrap from 'bootstrap'
window.bootstrap = bootstrap

// Si NO necesitas Echo/Pusher, puedes quitar esta línea por completo.
// Si la mantienes, asegúrate de que bootstrap.js **no** importe 'bootstrap'.
// import './bootstrap';

import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

document.addEventListener('DOMContentLoaded', () => {
  const el = document.querySelector('#heroCarousel');
  if (!el) return;

  bootstrap.Carousel.getOrCreateInstance(el, {
    interval: 6000,
    pause: 'hover',
    wrap: true,
    ride: false,   // manual mientras pruebas
    touch: true
  });

  el.addEventListener('slid.bs.carousel', (e) => {
    console.log('Slide actual:', e.to);
  });
});
>>>>>>> master
