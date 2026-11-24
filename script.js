// script.js
let currentPage = location.pathname.split('/').pop();
if (currentPage === '') currentPage = 'landing.php';

document.querySelectorAll('.nav ul li a').forEach(link => {
  const linkPage = link.getAttribute('href').split('/').pop();
  if (linkPage === currentPage) link.classList.add('active');
});