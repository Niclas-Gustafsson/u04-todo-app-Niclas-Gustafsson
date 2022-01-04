//Fetched DOM elements
const hamburger = document.querySelector('#hamburger');
const hamburgerLines = document.querySelector('.hamburger__lines');
const mobileMenu = document.querySelector('.nav-items');
// const navRight = document.querySelector('.nav-right');
const popup = document.querySelector('.popup');
const closePopup = document.querySelector('.notify-close');
const nav = document.querySelector('.nav');
let showMenu = false;

//Eventlisteners
hamburger.addEventListener("click", menuToggle);
closePopup.addEventListener("click", closeNotify);



//Functions

//Toggle menu for mobile
function menuToggle() {
    if(!showMenu) {
        hamburgerLines.classList.add('open');
        mobileMenu.classList.add('nav-open');
        showMenu = true;
        if(mobileMenu.classList.contains('nav-open')) {
            setTimeout(fixedNav, 500);
        }

    } else {
        // hamburger.classList.remove('open');
        hamburgerLines.classList.remove('open');
        mobileMenu.classList.remove('nav-open');
        nav.classList.remove('nav-lock');
        showMenu = false;
    }
}

//Function to fix issue where nav dissapears when scrollin with mobile menu open. Too dissy for solving it with css. It´s a function only to use it with setTimeout to prevent the position change of the body to be visible before the menu is open.
function fixedNav () {
    nav.classList.add('nav-lock');
}

//Close notification popup
function closeNotify() {
    popup.style.right = '-100%';
    popup.style.opacity = '0';
}



