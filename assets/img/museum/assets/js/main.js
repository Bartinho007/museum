let position = 0;
let sliderLine = document.querySelector('.slider-line');
let btnNext = document.getElementById('next');
let btnPrev = document.getElementById('prev');
let slideWidth = document.querySelector(".slide").offsetWidth;
let movePosition = slideWidth;
let slides = document.querySelectorAll(".slide");


function SliderNext() {
    position -= movePosition;
    if (position < -(movePosition * slides.length - movePosition)) {
        position = 0;
    }
    sliderLine.style.transform = `translateX(${position}px)`;
}

function SliderPrev() {
    position += movePosition;
    if (position > 0) {
        position = -(movePosition * slides.length - movePosition)
    }
    sliderLine.style.transform = `translateX(${position}px)`;
}

(function AutoMathic() {
    setInterval(SliderNext, 3000)
})()

btnNext.addEventListener('click', SliderNext);
btnPrev.addEventListener('click', SliderPrev);