<?php
session_start();

if (isset($_POST['login'])) {
    include 'connect.php'; 

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM signUp WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Directly compare plain text passwords (not recommended for production)
        if ($password == $user['password']) {
            // Regenerate session ID to prevent session fixation
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['userName'];
            $_SESSION['is_admin'] = $user['is_admin'];

            // Implement "Remember Me" functionality
            if (isset($_POST['rememberMe'])) {
                setcookie('user_id', $user['id'], time() + (86400 * 30), "/"); // 30 days
                setcookie('username', $user['userName'], time() + (86400 * 30), "/");
                setcookie('is_admin', $user['is_admin'], time() + (86400 * 30), "/");
            }

            if ($user['is_admin'] == 1) {
                echo "<script>alert('Welcome, Admin!'); window.location.href='admin/admin.php';</script>";
            } else {
                echo "<script>alert('Welcome, Customer!'); window.location.href='homepage.php';</script>";
            }
            exit();
        } else {
            echo "<script>alert('Incorrect email or password.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Incorrect email or password.'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container" id="loginContainer">
        <h2>Login to your account</h2>
        <form id="loginForm" method="post">
            <label for="email">Email</label>
            <input 
                class="login-input" 
                placeholder="Enter a valid email" 
                type="email" 
                id="email" 
                name="email" 
                required>
            <br>
            <label for="password">Password</label>
            <input 
                type="password" 
                required
                placeholder="Enter a valid password" 
                id="password" 
                name="password"
                class="password-input">
            <br>
            <div class="remember-me">
                <label class="remember-me-label" for="rememberMe">Remember Me</label>
                <br>
                <input 
                    class="remember-me-checkbox" 
                    type="checkbox" 
                    id="rememberMe" 
                    name="rememberMe">
            </div>
            <a href="forgotPassword.html" class="forgot-password">Forgot Password?</a>
            <br>
            <button 
                class="login-button"
                type="submit"
                name="login">Login
            </button>
        </form>
        <button class="back-button" onclick="window.location.href='index.php'">Back to Welcome Page</button>
        <p>To Create new Account <a href="signup.php">Sign Up</a></p>
    </div>
    <script src="script.js"></script>
</body>
</html>
