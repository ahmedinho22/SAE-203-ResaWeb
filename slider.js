document.addEventListener('DOMContentLoaded', () => {
  let currentSlide = 1;
  const totalSlides = document.querySelectorAll('.carrousel-slide').length;
  const slideDuration = 3000;

  const changeSlide = () => {
    document.querySelector('.carrousel-slide.active').classList.remove('active');
    currentSlide = (currentSlide + 1 > totalSlides) ? 1 : currentSlide + 1;
    document.querySelector(`.carrousel-slide[data-index="${currentSlide}"]`).classList.add('active');
  };

  setInterval(changeSlide, slideDuration);
});

// Smooth Scroll
const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');

for (let link of smoothScrollLinks) {
  link.addEventListener('click', smoothScroll);
}

function smoothScroll(event) {
  event.preventDefault();

  const targetId = this.getAttribute('href');
  const targetElement = document.querySelector(targetId);
  const targetPosition = targetElement.offsetTop;

  window.scrollTo({
    top: targetPosition,
    behavior: 'smooth'
  });
}

