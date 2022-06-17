let slideIndex = 0;

let slidesCount = 0;

let visibleSlides = 3;

initSlides(visibleSlides);


function plusSlides(n) {
    showSlides(slideIndex += n, visibleSlides);
}

function currentSlide(n) {
    showSlides(slideIndex = n, visibleSlides);
}

function showSlides(n, visibleSlides) {
    let slidesShow = document.querySelector(".slideshow-container");


    let i;
    let slides = slidesShow.getElementsByClassName("mySlides");


    let nextBtn = slidesShow.querySelector(".next");
    let prevBtn = slidesShow.querySelector(".prev");

    if (n == slidesCount) {
        nextBtn.setAttribute("disabled", true);
    }
    else {
        if (nextBtn.hasAttribute("disabled")) {
            nextBtn.removeAttribute("disabled");
        }
    }

    if (n == 0) {
        prevBtn.setAttribute("disabled", true);
    }
    else {
        if (prevBtn.hasAttribute("disabled")) {
            prevBtn.removeAttribute("disabled");
        }

    }


    for (i = 0; i < slideIndex - Math.floor(visibleSlides / 2); i++) {
        slides[i].style.display = "none";
    }

    let visibleLimitSlides = Math.min(slideIndex + Math.ceil(visibleSlides / 2), slides.length);
    // visible Slides 
    console.log(slideIndex - Math.floor(visibleSlides / 2))
    for (i = slideIndex - Math.floor(visibleSlides / 2); i < visibleLimitSlides; i++) {
        slides[i].style.display = "inline-block";
    }



    if ((slideIndex + Math.ceil(visibleSlides / 2)) < slides.length) {

        for (i = visibleLimitSlides; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
    }

    slides[slideIndex].style.display = "inline-block";


    // remove active slide class from previous slide
    if ( slides[slideIndex - 1] && slides[slideIndex - 1].classList.contains("activeSlide") ) {
        slides[slideIndex - 1].classList.remove("activeSlide");
        
    }

    // remove active slide class from previous slide
    if ( slides[slideIndex + 1] && slides[slideIndex + 1].classList.contains("activeSlide") ) {
        slides[slideIndex + 1].classList.remove("activeSlide");
        
    }
    

    slides[slideIndex].classList.add("activeSlide");



}


function initSlides(visibleSlides) {

    const slideWidth = (80 / visibleSlides).toFixed(2);

    let slidesShow = document.querySelector(".slideshow-container");
    let slides = slidesShow.getElementsByClassName("mySlides");
    Array.from(slides).forEach(slide => {
        slide.style.width = slideWidth + "%";
        // console.log(slide);
    });

    slidesCount = slides.length ;
    slideIndex = 2 ;
   

    let auxFirstSlide = document.createElement("div");
    auxFirstSlide.classList.add("mySlides");
    auxFirstSlide.style.width = slideWidth + "%";

    let auxLastSlide = document.createElement("div");
    auxLastSlide.classList.add("mySlides");
    auxLastSlide.style.width = slideWidth + "%";

    slidesShow.insertAdjacentElement("afterbegin", auxFirstSlide);
    slidesShow.insertAdjacentElement("beforeend", auxLastSlide);





    showSlides(slideIndex, visibleSlides);

}




