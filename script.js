function goToLoginPage() {
    window.location.href = 'login.php';
}

function goToHomePage() {
    window.location.href = 'homepage.php';
}

function goToContactsPage() {
    window.location.href = 'contact.html';
}

function goToAboutUsPage() {
    window.location.href = 'aboutus.html';
}

function goToRoomsPage() {
    window.location.href = 'rooms.php';
}

function goToMyAccountPage() {
    window.location.href = 'myaccount.php';
}
function goToFoodAndDrinksPage() {
    window.location.href = 'food-and-drinks.html';
}

function goToSignupPage() {
    window.location.href = 'signup.php';
}

function goToWelcomePage() {
    window.location.href = 'index.php';
        var loginContainer = document.getElementById('loginContainer');
        if (loginContainer) {
            loginContainer.classList.add('hidden');
        }
    
        var signupContainer = document.getElementById('signupContainer');
        if (signupContainer) {
            signupContainer.classList.add('hidden');
        }
    
        var homeContainer = document.getElementById('welcomePagecontainer');
        if (homeContainer) {
            homeContainer.classList.remove('hidden');
        }
}

function goToForgotPassword() {
    window.location.href = 'forgotPassword.html';
}
    
function sendResetLink(event) {
    event.preventDefault();
   
    window.location.href = 'resetPassword.html';
}

function resetPassword(event) {
    event.preventDefault();
   
    window.location.href = 'login.php';
}

function validatePassword() {
    const passwordInput = document.getElementById('password');
    const passwordError = document.getElementById('passwordError');
    
    
    const hasUpperCase = /[A-Z]/.test(passwordInput.value);
    const hasNumber = /[0-9]/.test(passwordInput.value);
    const isLengthValid = passwordInput.value.length >= 8;

    
    passwordError.textContent = '';
    if (!hasUpperCase) {
        passwordError.textContent += 'Password must contain at least one capital letter.\n';
    }
    if (!hasNumber) {
        passwordError.textContent += 'Password must contain at least one number. \n';
    }
    if (!isLengthValid) {
        passwordError.textContent += 'Password must be at least 8 characters long. ';
    }
}

//chosing either rooms with 1 bed or 2 beds
function showContent() {
    var choice = document.getElementById("choice").value;
    var content1 = document.getElementById("content-1");
    var content2 = document.getElementById("content-2");
            
    if (choice === "option1") {
        content1.style.display = "block";
        content2.style.display = "none";
    } else if (choice === "option2") {
        content1.style.display = "none";
        content2.style.display = "block";
    } else {
        content1.style.display = "none";
        content2.style.display = "none";
    }
}


document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.getElementById('menu-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    menuButton.addEventListener('click', function (event) {
        event.stopPropagation();
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    // Close the dropdown menu if the user clicks outside of it
    window.addEventListener('click', function () {
        if (dropdownMenu.style.display === 'block') {
            dropdownMenu.style.display = 'none';
        }
    });
});
