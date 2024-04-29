<?php
session_start();
if(!isset($_SESSION['UserId']) || empty($_SESSION['UserId'])){
    echo '<script>location.href = \'login.php\';</script>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('include/head.php'); ?>
<body class="normalBody" onload="setActive('nav_security')">
    <?php include('include/navbar.php'); ?>
    <script src="js/script.js"></script>
</body>
</html>