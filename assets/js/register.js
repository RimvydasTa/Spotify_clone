"use strict";


document.addEventListener("DOMContentLoaded", function () {


    var hideLoginBtn = document.querySelector('#hideLogin');
    var hideRegisterBtn = document.querySelector('#hideRegister');

    var loginForm = document.querySelector("#loginForm");
    var registerForm = document.querySelector("#registerForm");

    var registerBtn = document.querySelector('#register_button');

    hideLoginBtn.addEventListener("click", function () {
        loginForm.style.height = "0";
        loginForm.style.overflow = "hidden";

        registerForm.style.display = "100%";
        registerForm.style.overflow = "visible";
    });

    hideRegisterBtn.addEventListener("click", function () {


        registerForm.style.height = "0";
        registerForm.style.overflow = "hidden";

        loginForm.style.display = "100%";
        loginForm.style.overflow = "visible";
    });



});

