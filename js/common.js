//Slider for login and register form
document.addEventListener("DOMContentLoaded", function () {
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (() => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
        signupBtn.click();
        return false;
    });


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