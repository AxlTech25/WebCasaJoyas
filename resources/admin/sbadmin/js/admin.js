// ### Bundle ADMIN (SB Admin 2)

// 1) jQuery y Bootstrap 4
import 'jquery';
import 'bootstrap'; // con bootstrap@4.6.2

// 2) Easing, Chart.js y (opcional) DataTables
import 'jquery.easing';
import 'chart.js/auto';
// import 'datatables.net';
// import 'datatables.net-bs4';

// 3) Estilos admin (FontAwesome + SCSS de SB Admin 2)
import '@fortawesome/fontawesome-free/css/all.min.css';
import '../scss/admin.scss';

// 4) Scripts propios SB Admin 2 (si deseas usar los originales)
import './sb-admin-2'; // adapta si tu archivo se llama .min.js

// 5) Ejemplos de charts (puedes moverlos a vistas si quieres)
window.addEventListener('DOMContentLoaded', () => {
  const area = document.getElementById('myAreaChart');
  if (area) {
    // Simple area/line
    new (window.Chart)(area.getContext('2d'), {
      type: 'line',
      data: {
        labels: ['Ene','Feb','Mar','Abr','May','Jun'],
        datasets: [{
          label: 'Ventas (S/)',
          data: [1200, 1900, 1600, 2200, 2000, 2500],
          fill: true,
          tension: 0.35
        }]
      },
      options: { plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
    });
  }

  const pie = document.getElementById('myPieChart');
  if (pie) {
    new (window.Chart)(pie.getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: ['Anillos','Pulseras','Collares'],
        datasets: [{ data: [55, 25, 20] }]
      },
      options: { cutout: '60%' }
    });
  }
});
