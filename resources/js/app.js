import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


// const registerButton = document.getElementById('register-btn');

// registerButton.addEventListener('click', function (event) {

//     event.preventDefault();

//     const password = document.getElementById('password');
//     const confirm_password = document.getElementById('password-confirm');
//     const registerForm = document.getElementById('register-form');


//     const laravelAlert = document.getElementById('laravel-password-error');
//     const alert = document.getElementById('password-error');
//     alert.classList.remove("d-block");
//     alert.classList.add('d-none');

//     if (password.value === confirm_password.value && password.value && confirm_password.value) {
//         alert.classList.remove("d-block");
//         alert.classList.add('d-none');
//         registerForm.submit();
//     }
//     else if (password.value && confirm_password.value) {
//         alert.classList.remove("d-none");
//         alert.classList.add("d-block");
//         password.classList.add('is-invalid');
//     }
//     else {
//         alert.classList.remove("d-block");
//         alert.classList.add('d-none');
//         registerForm.submit();
//     }
// })
