<?php
session_start();
if(isset($_SESSION['UserId']) && !empty($_SESSION['UserId'])){
    echo '<script>location.href = \'home.php\';</script>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('include/head.php'); ?>
<body class="centerBody">
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="images/frontImg.jpeg" alt="">
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input id="loginEmail" type="text" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input id="loginPwd" type="password" placeholder="Enter your password" required>
                        </div>
                        <div class="button input-box">
                            <input type="submit" value="Login" onclick="login()">
                        </div>
                        <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
                    </div>
                </div>
                <div class="signup-form">
                    <div class="title">Signup</div>
                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="fas fa-user"></i>
                            <input id="signupName" type="text" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input id="signupEmail" type="text" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input id="signupPwd" type="password" placeholder="Enter your password" required>
                        </div>
                        <div class="button input-box">
                            <input type="submit" value="Signup" onclick="signup()">
                        </div>
                        <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
