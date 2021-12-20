//Fetched DOM elements
const hamburger = document.querySelector('#hamburger');
const hamburgerLines = document.querySelector('.hamburger__lines');
const mobileMenu = document.querySelector('.nav-items');
const navRight = document.querySelector('.nav-right');
let showMenu = false;

//Eventlisteners
hamburger.addEventListener("click", menuToggle);



//Functions

//Toggle menu for mobile
function menuToggle() {
    if(!showMenu) {
        // hamburger.classList.add('open');
        hamburgerLines.classList.add('open');
        mobileMenu.classList.add('nav-open');
        // navRight.classList.add('nav-open');
        showMenu = true;
    } else {
        // hamburger.classList.remove('open');
        hamburgerLines.classList.remove('open');
        mobileMenu.classList.remove('nav-open');
        showMenu = false;
    }
}


