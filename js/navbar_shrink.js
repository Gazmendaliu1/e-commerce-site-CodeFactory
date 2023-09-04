document.addEventListener("DOMContentLoaded", function () {
    // Add a class to the body element to prevent FOUC
    document.body.classList.add("js-loaded");
});

const navbar = document.getElementById("navbar");
const navbarCollapse = document.getElementById("myNavbarToggler7");
const stickyOffset = navbar.offsetTop;

// Toggle the navigation bar collapse
function toggleNavbar() {
    if (window.innerWidth < 992) { // Adjust the breakpoint as needed
        if (navbarCollapse.classList.contains("show")) {
            navbarCollapse.classList.remove("show");
        } else {
            navbarCollapse.classList.add("show");
        }
    }
}

// Attach the toggle function to the navbar toggler button
document.querySelector(".navbar-toggler").addEventListener("click", toggleNavbar);

// Make the navigation bar sticky on scroll
window.onscroll = function () {
    if (window.pageYOffset >= stickyOffset) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
};


