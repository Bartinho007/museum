const sliderLine = document.querySelector('.slider-line');
const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

// Перерасчет ширины при загрузке страницы
window.addEventListener('load', () => {
    updateSliderPosition();
});

// Кнопка "следующий слайд"
document.getElementById('next').addEventListener('click', () => {
    currentSlide++;
    if (currentSlide >= slides.length) {
        currentSlide = 0; // Если слайды закончились, возвращаемся к первому
    }
    console.log(currentSlide);
    updateSliderPosition();
});

// Кнопка "предыдущий слайд"
document.getElementById('prev').addEventListener('click', () => {
    currentSlide--;
    if (currentSlide < 0) {
        currentSlide = slides.length - 1; // Возвращаемся к последнему слайду
    }
    console.log(currentSlide);
    updateSliderPosition();
});

function updateSliderPosition() {
    console.log(`Текущий индекс слайда: ${currentSlide}`);
    const slideWidth = slides[0].clientWidth; // Получаем ширину первого слайда
    sliderLine.style.transform = `translateX(-${currentSlide * slideWidth}px)`; // Сдвигаем контейнер на ширину слайда
}
