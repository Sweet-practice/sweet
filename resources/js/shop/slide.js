var sliderImages = document.querySelectorAll('.slide');
var arrowRight = document.getElementById('arrow-right');
var arrowLeft = document.getElementById('arrow-left');
var current = 0;

function startSlide(){
    sliderImages[0].style.display = 'block';
}

arrowRight.addEventListener('click', function() {
    sliderImages[current].style.display = 'none';
    if(current === sliderImages.length - 1){
        current = -1;
    }
    sliderImages[current + 1].style.display = 'block';
    current++;
})

arrowLeft.addEventListener('click', function() {
    sliderImages[current].style.display = 'none';
    if(current === 0){
        current = sliderImages.length;
    }
    sliderImages[current - 1].style.display = 'block';
    current--;
})

startSlide();