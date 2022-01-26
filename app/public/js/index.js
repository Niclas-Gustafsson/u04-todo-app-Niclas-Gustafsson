//Fetched DOM elements
const nav = document.querySelector('.nav');
const hamburger = document.querySelector('#hamburger');
const hamburgerLines = document.querySelector('.hamburger__lines');
const mobileMenu = document.querySelector('.nav-items');
const popup = document.querySelector('.popup');
const closePopup = document.querySelector('.notify-close');
const logoutBtn = document.querySelectorAll('.logout-btn');
const promptWindow = document.querySelector('.prompt-overlay');
let showMenu = false;


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

function menuToggle() {
    if(!showMenu) {
        hamburgerLines.classList.add('open');
        mobileMenu.classList.add('nav-open');
        mobileMenu.style.opacity = 1;
        showMenu = true;
        if(mobileMenu.classList.contains('nav-open')) {
            setTimeout(fixedNav, 500);
        }

    } else {
        hamburgerLines.classList.remove('open');
        mobileMenu.classList.remove('nav-open');
        nav.classList.remove('nav-lock');
        mobileMenu.style.opacity = 0;
        showMenu = false;
    }
}

//Function to fix issue where nav dissapears when scrollin with mobile menu open. Too dissy for solving it with css. It´s a function only to use it with setTimeout to prevent the position change of the body to be visible before the menu is open.
function fixedNav () {
    nav.classList.add('nav-lock');
}

function closeNotify() {
    popup.style.right = '-10%';
    popup.style.opacity = '0';
    setTimeout(function() {
        popup.style.display = 'none';

    }, 500);
}

function toggleLogout() {
    promptWindow.style.display = 'block';
    setTimeout(function() {
        
        promptWindow.style.opacity = '1';

    }, 100);
}



