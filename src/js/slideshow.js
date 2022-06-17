let visibleSlides = 3;

initSlides(visibleSlides);



function plusSlides(n, carousel) {
    // showSlides(slideIndex += n, visibleSlides, carousel);
    return function(e) {
        let slideIndex = parseInt(carousel.dataset.slideIndex) ;
        carousel.dataset.slideIndex = slideIndex + n;
        showSlides(visibleSlides, carousel);
    }
}


function showSlides(visibleSlides, carousel) {
    const slideIndex = parseInt(carousel.dataset.slideIndex);


    let i;
    let slides = carousel.getElementsByClassName("mySlides");

    const slidesCount = slides.length;


    let nextBtn = carousel.querySelector(".next");
    let prevBtn = carousel.querySelector(".prev");

    if (slideIndex == slidesCount - 2) {
        nextBtn.setAttribute("disabled", true);
    }
    else {
        if (nextBtn.hasAttribute("disabled")) {
            nextBtn.removeAttribute("disabled");
        }
    }

    if (slideIndex == 1) {
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
    if (slides[slideIndex - 1] && slides[slideIndex - 1].classList.contains("activeSlide")) {
        slides[slideIndex - 1].classList.remove("activeSlide");

    }

    // remove active slide class from previous slide
    if (slides[slideIndex + 1] && slides[slideIndex + 1].classList.contains("activeSlide")) {
        slides[slideIndex + 1].classList.remove("activeSlide");

    }



    slides[slideIndex].classList.add("activeSlide");



}


function initSlides(visibleSlides) {
    let slidesShow = document.querySelectorAll(".slideshow-container");

    Array.from(slidesShow).forEach(carousel => {
        let slideIndex = 2;
        carousel.dataset.slideIndex = slideIndex;

        let slidesCount;

        const slideWidth = (80 / visibleSlides).toFixed(2);

        let slides = carousel.getElementsByClassName("mySlides");
        Array.from(slides).forEach(slide => {
            slide.style.width = slideWidth + "%";

        });

        slidesCount = slides.length;



        let auxFirstSlide = document.createElement("div");
        auxFirstSlide.classList.add("mySlides");
        auxFirstSlide.style.width = slideWidth + "%";

        let auxLastSlide = document.createElement("div");
        auxLastSlide.classList.add("mySlides");
        auxLastSlide.style.width = slideWidth + "%";

        carousel.insertAdjacentElement("afterbegin", auxFirstSlide);
        carousel.insertAdjacentElement("beforeend", auxLastSlide);

        let prevButton = carousel.querySelector("button.prev");
        let nextButton = carousel.querySelector("button.next");

        // prevButton.addEventListener("click", incrementSlides(-1, slideIndex, carousel));
        // nextButton.addEventListener("click", incrementSlides( 1, slideIndex, carousel));

        prevButton.addEventListener("click", plusSlides( -1, carousel));
        nextButton.addEventListener("click", plusSlides( +1, carousel));

        showSlides(visibleSlides, carousel);

    });

}






