<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelmas Lodges and Accommodation - Welcome Page</title>
        <link rel="stylesheet" href="login.css">
    </head>
    
    <body>
        <div class="container" id="welcomePageContainer">
            <h2>Kelmas Lodges and Accommodation</h2>

            <a href="login.php"><button onclick="goToLoginPage()">Log In</button></a><br>
            <p>
                Already a member? Click the log in button aboveto log in.
            </p>

            <a href="signup.php"><button 
                onclick="goToSignupPage()">Sign Up
            </button></a>
            <p>
                If you dont have an account, click the sign up button to create an account
            </p>
            
        </div>

        <p class="terms-paragraph">
            Make sure to read and understand the terms and conditions of our company. 
            To do so, <a href="terms-and-conditions.html"
            class="terms-and-conditions"
            onclick="goToTermsAndConditionsPage()">click here</a>
        </p>


        <div class="footer">
            <p>&copy; 2024 Kelmas Lodges and Accommodation. All rights reserved.</p>
            <p>Argwings Kodhek and Valley Road, of Hurlingham, Kenya</p>
        </div>
        
    <script src="html/script.js"></script>
    </body>
</html>
