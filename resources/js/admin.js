// --- Librerías del admin (SB Admin 2 usa Bootstrap 4) ---
import 'jquery';
import 'jquery.easing';
import 'bootstrap4'; // asegúrate de tener bootstrap@4 instalado
import 'chart.js/auto'; // Chart.js v4
// Iconos
import '@fortawesome/fontawesome-free/css/all.min.css';

// Estilos del admin
import '../scss/admin.scss';

// JS propio del template (ajusta nombre si el tuyo es distinto)
import '../vendor/sbadmin/js/sb-admin-2';

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
