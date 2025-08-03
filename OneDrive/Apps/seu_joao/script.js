let slideAtual = 0;
const slides = document.querySelectorAll('.slide');

function mostrarSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove('active');
    if (i === index) slide.classList.add('active');
  });
}

function mudarSlide(direcao) {
  slideAtual += direcao;
  if (slideAtual >= slides.length) slideAtual = 0;
  if (slideAtual < 0) slideAtual = slides.length - 1;
  mostrarSlide(slideAtual);
}

// Mostrar o primeiro slide automaticamente
mostrarSlide(slideAtual);