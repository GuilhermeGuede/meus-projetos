let currentIndex = 0;

function moveSlide(direction) {
    const carouselInner = document.querySelector('.carousel-inner');
    const slides = document.querySelectorAll('.carousel-inner img');
    const totalSlides = slides.length;

    currentIndex += direction;

    if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    } else if (currentIndex >= totalSlides) {
        currentIndex = 0;
    }

    const offset = -currentIndex * 100;
    carouselInner.style.transform = `translateX(${offset}%)`;
}
