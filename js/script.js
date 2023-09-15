(() =>{

const openNavMenu = document.querySelector(".open-nav-menu"),
closeNavMenu = document.querySelector(".close-nav-menu"),
navMenu = document.querySelector(".nav-menu");


openNavMenu.addEventListener("click", toggleNav);

function toggleNav() {
    navMenu.classList.toggle("open");
    
}
}) ();