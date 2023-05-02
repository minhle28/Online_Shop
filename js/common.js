//Slider for login and register form
document.addEventListener("DOMContentLoaded", function () {
    //Change title name for all.php
    const categoryLinks = document.querySelectorAll('.nav-list a[data-category]');
    const categoryTitle = document.querySelector('h3');

    categoryLinks.forEach(link => {
        link.addEventListener('click', () => {
            const category = link.dataset.category;
            categoryTitle.textContent = category.charAt(0).toUpperCase() + category.slice(1);
        });
    });


});