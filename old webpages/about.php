<?php
session_start();
if(!isset($_SESSION['UserId']) || empty($_SESSION['UserId'])){
    echo '<script>location.href = \'login.php\';</script>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('include/head.php'); ?>
<body class="centerBody" onload="setActive('nav_about')">
    <?php include('include/navbar.php'); ?>
    <div class="container">
        <h1>
            About Section
        </h1>            
        
    </div>
    <script src="js/script.js"></script>
</body>
</html>