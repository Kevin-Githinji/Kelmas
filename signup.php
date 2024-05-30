<?php
session_start(); 

if(isset($_POST['save'])){
    include 'connect.php';
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $is_admin = isset($_POST['is_admin']) ?1 : 0;
    
    if($password !== $confirm_password){
        echo "<script>alert('Passwords do not match'); window.location.href='signup.php';</script>";
        exit();
    }

    $user_check_query = "SELECT * FROM signUp WHERE userName='$userName' OR email='$email' LIMIT 1";
    $result = $conn->query($user_check_query);
    $user = $result->fetch_assoc();

    if ($user) { 
        if ($user['userName'] === $userName) {
            echo "<script>alert('Username already exists'); window.location.href='signup.php';</script>";
            exit();
        }

        if ($user['email'] === $email) {
            echo "<script>alert('Email already exists'); window.location.href='signup.php';</script>";
            exit();
        }
    }

    if($is_admin) {
        $admin_check_query = "SELECT * FROM signUp WHERE is_admin=1 LIMIT 1";
        $result = $conn->query($admin_check_query);
        if($result->num_rows > 0) {
            echo "<script>alert('An admin account already exists.'); window.location.href='login.php';</script>";
            exit();
        }
    }  

    $qry = "INSERT INTO signUp (email, phoneNumber, firstName, lastName, userName, password, is_admin) 
    VALUES ('$email', '$phoneNumber', '$firstName', '$lastName', '$userName', '$password', '$is_admin')";

    if ($conn->query($qry) === TRUE) {
        echo "<script>alert('Signup was successful. Back to login page'); window.location.href='login.php';</script>";
    }
    else{
        echo "<script>alert('Signup error'); window.location.href='signup.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Page</title>
        <link rel="stylesheet" href="login.css">
    </head>

    <body>
        <div class="container" id="signupContainer">
            <div class="container" id="signupContainer">

                <h2>Create an account</h2>
                
                <form id="signupForm" action="" method="post">
                    <label for="email">Email</label>
                    <input 
                        class="login-input" 
                        type="email" 
                        id="email" 
                        name="email"
                        required 
                        placeholder="Enter a valid Email"
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                    <br>
            
                    <label for="phoneNumber">Phone Number</label>
                    <input 
                        class="login-input" 
                        type="tel" 
                        id="phoneNumber" 
                        name="phoneNumber" 
                        placeholder="Enter a valid Phone Number"
                        required pattern="[0-9]{10,15}">
                    <br>
            
                    <label for="firstName">First Name</label>
                    <input 
                        class="login-input" 
                        type="text" 
                        placeholder="Enter your first name"
                        id="firstName"
                        name="firstName" 
                        required pattern="[A-Za-z]{1,}">
                    <br>
            
                    <label for="lastName">Last Name</label>
                    <input 
                        class="login-input" 
                        type="text" 
                        placeholder="Enter your last name"
                        id="lastName" 
                        name="lastName" 
                        required pattern="[A-Za-z]{1,}">
                    <br>
            
                    <label for="username">Username</label>
                    <input 
                        class="login-input" 
                        type="text" 
                        placeholder="Enter prefered Username"
                        id="username" 
                        name="userName" 
                        required pattern="[A-Za-z0-9]{1,}">
                        <br>
            
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="Enter a valid Password"
                        class="password-input" 
                        oninput="validatePassword()">

                    <p class="error-message" id="passwordError"></p>
            
                    <label for="password">Confirm Password</label>
                    <input 
                        type="password" 
                        id="password"
                        name="confirm_password" 
                        placeholder="Confirm your Password"
                        class="password-input" 
                        oninput="validatePassword()">
                    <br>

                    <div class="remember-me">
                        <label 
                        for="termsCheckbox"
                        class="termsLabel">
                        I accept the terms and conditions
                        </label>    
                        <input type="checkbox" 
                        id="termsCheckbox" 
                        required
                        name="termsCheckbox">
                    </div>
                    <br>

                    <div class="remember-me">
                        <label 
                        for="termsCheckbox"
                        id="terms-label"
                        class="termsLabel">
                        Confirm you are 18years and above
                        </label>    
                        <input type="checkbox" 
                        id="termsCheckbox" 
                        required
                        name="termsCheckbox">
                    </div>
                    <br>

                    <div class="remember-me">
                        <label 
                            for="is-admin"
                            class="termsLabel">
                            Admin
                        </label>    
                        <input 
                            type="checkbox"  
                            id="termscheckbox"
                            name="is_admin">
                    </div>
                    <br>

                    <p class="error-message" id="passwordError"></p>

                    <button type="submit" name="save">Sign Up</button>

                    <button onclick="goToWelcomePage()">Back to Welcome Page</button>
                </form>
            </div>
        </div>

        <script src="script.js"></script>

    </body>
</html>
