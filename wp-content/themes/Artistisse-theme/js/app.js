document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenuContainer = document.querySelector('.nav-menu-container');

    menuToggle.addEventListener('click', function() {
        navMenuContainer.classList.toggle('active');
    });
});
