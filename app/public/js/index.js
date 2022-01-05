//Fetched DOM elements
const nav = document.querySelector('.nav');
const hamburger = document.querySelector('#hamburger');
const hamburgerLines = document.querySelector('.hamburger__lines');
const mobileMenu = document.querySelector('.nav-items');
// const navRight = document.querySelector('.nav-right');
const popup = document.querySelector('.popup');
const closePopup = document.querySelector('.notify-close');
const logoutBtn = document.querySelectorAll('.logout-btn');
const promptWindow = document.querySelector('.prompt-overlay');
let showMenu = false;

//Eventlisteners
/* document.addEventListener("DOMContentLoaded", function(){
}); */

    logoutBtn.forEach(element => {
        
        element.addEventListener("click", (e) => {
            toggleLogout();
        });
    });

hamburger.addEventListener("click", menuToggle);

// Removed issue with error message saying "Cannot read property of null (reading addEventListener)"
if(closePopup) {
    closePopup.addEventListener("click", closeNotify);
}

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
    popup.style.right = '-10%';
    popup.style.opacity = '0';
    setTimeout(function() {
        popup.style.display = 'none';

    }, 500);
}

function toggleLogout() {
    // const promptWindow = document.querySelector('.prompt-overlay');
    promptWindow.style.display = 'block';
}



