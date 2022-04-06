//Carousel 0

let track = document.querySelector(".carouselTrack");
if (track) {
let slides = Array.from(track.children);
let nextButton = document.querySelector(".carouselButtonRight");
let prevButton = document.querySelector(".carouselButtonLeft");
let dotsNav = document.querySelector(".carouselNav");
let dots = Array.from(dotsNav.children);

let slideWidth = slides[0].getBoundingClientRect().width;

/* for (let i = 0; i < slides.length; i++) {
    console.log(slides[0]);
/*     if (i == 0) {
        dotsNav.innerHTML = `<button class="p-0 carouselIndicator currentSlide"><img class="w-100" src="${slides[0].getAttribute('src')}" alt=""></button>`
    } else {
        dotsNav.innerHTML = `<button class="p-0 carouselIndicator"><img class="w-100" src="${slides[i].getAttribute('src')}" alt=""></button>`
    } */


function setSlidePosition(slide, index) {
    slide.style.left = `${slideWidth * index}px`;
}
slides.forEach(setSlidePosition);

function moveToSlide(track, currentSlide, targetSlide) {
    track.style.transform = `translateX(-${targetSlide.style.left})`;
    currentSlide.classList.remove("currentSlide");
    targetSlide.classList.add("currentSlide");
}

function updateDots(currentDot, targetDot) {
    currentDot.classList.remove("currentSlide");
    targetDot.classList.add("currentSlide");
}

prevButton.addEventListener("click", () => {
    let currentSlide = track.querySelector(".currentSlide");

    let currentDot = dotsNav.querySelector(".currentSlide");

    let index = slides.findIndex(slide => slide === currentSlide);

    if(index === 0) {
        track.style.transform = `translateX(-${slides[slides.length - 1]})`;
        let lastSlide = slides[slides.length - 1]
        let lastDot = dotsNav.lastElementChild;
        moveToSlide(track, currentSlide, lastSlide);
        updateDots(currentDot, lastDot);
    } else {
        let prevSlide = currentSlide.previousElementSibling;
        let prevDot = currentDot.previousElementSibling;
        moveToSlide(track, currentSlide, prevSlide);
        updateDots(currentDot, prevDot);
    }
});

nextButton.addEventListener("click", () => {
    let currentSlide = track.querySelector(".currentSlide");

    let currentDot = dotsNav.querySelector(".currentSlide");

    let index = slides.findIndex(slide => slide === currentSlide);

    if(index === slides.length - 1) {
        track.style.transform = `translateX(+${slides[slides.length - 1]})`;
        let firstSlide = slides[0];
        let firstDot = dotsNav.firstElementChild;
        moveToSlide(track, currentSlide, firstSlide);
        updateDots(currentDot, firstDot);
    } else {
        let nextSlide = currentSlide.nextElementSibling;
        let nextDot = currentDot.nextElementSibling;
        moveToSlide(track, currentSlide, nextSlide);
        updateDots(currentDot, nextDot);
    }
});

dotsNav.addEventListener("click", (event) => {
    console.log(event);
    let targetDot = event.target.closest("button");
    
    if(!targetDot) return;

    let currentSlide = track.querySelector(".currentSlide");
    let currentDot = dotsNav.querySelector(".currentSlide");
    let targetIndex = dots.findIndex(dot => dot === targetDot);
    let targetSlide = slides[targetIndex];

    moveToSlide(track, currentSlide, targetSlide);
    updateDots(currentDot, targetDot);
});

window.setInterval(function() {
    let currentSlide = track.querySelector(".currentSlide");

    let currentDot = dotsNav.querySelector(".currentSlide");

    let index = slides.findIndex(slide => slide === currentSlide);

    if(index === slides.length - 1) {
        track.style.transform = `translateX(+${slides[slides.length - 1]})`;
        let firstSlide = slides[0];
        let firstDot = dotsNav.firstElementChild;
        moveToSlide(track, currentSlide, firstSlide);
        updateDots(currentDot, firstDot);
    } else {
        let nextSlide = currentSlide.nextElementSibling;
        let nextDot = currentDot.nextElementSibling;
        moveToSlide(track, currentSlide, nextSlide);
        updateDots(currentDot, nextDot);
    }

    let targetDot = event.target.closest("button");

    if(!targetDot) return;

    let targetIndex = dots.findIndex(dot => dot === targetDot);
    let targetSlide = slides[targetIndex];

    updateDots(currentDot, targetDot);
}, 5000);

}


// Carousel 1

// let track1 = document.querySelector(".carouselTrack1");
// if (track1) {
// let slides1 = Array.from(track.children);
// let nextButton1 = document.querySelector(".carouselButtonRight1");
// let prevButton1 = document.querySelector(".carouselButtonLeft1");
// let dotsNav1 = document.querySelector(".carouselNav1");
// let dots1 = Array.from(dotsNav1.children);

// slides1[0].classList.add("currentSlide");

// let slideWidth1 = slides1[0].getBoundingClientRect().width;

// function setSlidePosition1(slide, index) {
//     slide.style.left = `${slideWidth1 * index}px`;
// }
// slides1.forEach(setSlidePosition1);

// function moveToSlide1(track, currentSlide, targetSlide) {
//     track.style.transform = `translateX(-${targetSlide.style.left})`;
//     currentSlide.classList.remove("currentSlide");
//     targetSlide.classList.add("currentSlide");
// }

// function updateDots1(currentDot, targetDot) {
//     currentDot.classList.remove("currentSlide");
//     targetDot.classList.add("currentSlide");
// }

// prevButton1.addEventListener("click", () => {
//     let currentSlide = track1.querySelector(".currentSlide");

//     let currentDot = dotsNav1.querySelector(".currentSlide");

//     let index = slides1.findIndex(slide => slide === currentSlide);

//     if(index === 0) {
//         track.style.transform = `translateX(-${slides1[slides1.length - 1]})`;
//         let lastSlide = slides1[slides1.length - 1]
//         let lastDot = dotsNav1.lastElementChild;
//         moveToSlide1(track, currentSlide, lastSlide);
//         updateDots1(currentDot, lastDot);
//     } else {
//         let prevSlide = currentSlide.previousElementSibling;
//         let prevDot = currentDot.previousElementSibling;
//         moveToSlide1(track, currentSlide, prevSlide);
//         updateDots1(currentDot, prevDot);
//     }
// });

// nextButton1.addEventListener("click", () => {
//     let currentSlide = track1.querySelector(".currentSlide");

//     let currentDot = dotsNav1.querySelector(".currentSlide");

//     let index = slides1.findIndex(slide => slide === currentSlide);

//     if(index === slides1.length - 1) {
//         track.style.transform = `translateX(+${slides1[slides1.length - 1]})`;
//         let firstSlide = slides1[0];
//         let firstDot = dotsNav1.firstElementChild;
//         moveToSlide1(track, currentSlide, firstSlide);
//         updateDots1(currentDot, firstDot);
//     } else {
//         let nextSlide = currentSlide.nextElementSibling;
//         let nextDot = currentDot.nextElementSibling;
//         moveToSlide(track, currentSlide, nextSlide);
//         updateDots(currentDot, nextDot);
//     }
// });

// dotsNav1.addEventListener("click", (event) => {
//     let targetDot = event.target.closest("button");

//     if(!targetDot) return;

//     let currentSlide = track1.querySelector(".currentSlide");
//     let currentDot = dotsNav1.querySelector(".currentSlide");
//     let targetIndex = dots1.findIndex(dot => dot === targetDot);
//     let targetSlide = slides1[targetIndex];

//     moveToSlide1(track, currentSlide, targetSlide);
//     updateDots1(currentDot, targetDot);
// });
// }

// Form lavora con noi

let sendLetter = document.querySelector("#sendLetter");
if(sendLetter){
function addClass() {
    document.body.classList.add("sent");
  }
  
sendLetter.addEventListener("click", addClass);
}


// Fade In Up For Each

function handleIntersectionFadeInLeftForEach(entries) {
    entries.map((entry, index) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("fadeInLeft");
            entry.target.classList.remove("opacity-0");
            entry.target.style.animationDelay = `${index/5}s`;
        }
    });
}

let observerFadeInLeftForEach = new IntersectionObserver(handleIntersectionFadeInLeftForEach);


// Accordion animation

let accordion = document.querySelectorAll(".box");
if (accordion) {
    accordion.forEach(el => {
        observerFadeInLeftForEach.observe(el);
    });
}


// Tables

$(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();

// inizio codice dark theme
/* let toggle_icon = document.getElementById('theme-toggle');
let body = document.getElementsByTagName('body')[0];
let sun_class = 'bi-sun';
let moon_class = 'bi-moon';
let dark_theme_class = 'dark-theme';
let tables=document.querySelectorAll('.table');


toggle_icon.addEventListener('click', function() {
    if (body.classList.contains(dark_theme_class)) {
        toggle_icon.classList.add(moon_class);
        toggle_icon.classList.remove(sun_class);
        tables.forEach(table=>{
            table.classList.remove('text-white');
        })
         
        body.classList.remove(dark_theme_class);

        setCookie('theme', 'light');
    }
    else {
     
        toggle_icon.classList.add(sun_class);
        toggle_icon.classList.remove(moon_class);
        tables.forEach(table=>{
            table.classList.add('text-white');
        })
        body.classList.add(dark_theme_class);

        setCookie('theme', 'dark');
    }
});
*/

//elementi catturati
let spinner= document.querySelector('#spinner');

// Spinner
    let animatedSpinner = function () {
        setTimeout(function () {
            spinner.classList.remove('show');
        },1000);
    };
    animatedSpinner();

//Get the button:
mybutton = document.getElementById("myBtn");
if (mybutton){
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
}