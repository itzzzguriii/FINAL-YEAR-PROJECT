<?php 
require_once('dbCon.php');
session_start();
if(!isset($_SESSION['UserId']) || empty($_SESSION['UserId'])) {
   header("location: login.php");
} else if(!isset($_SESSION['accessType']) || empty($_SESSION['accessType'])) {
   header("location: login.php");
} else if (isset($_SESSION['accessType']) != "admin") {
   header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Auto Electrik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body class="normalBody">
    <?php require_once('controls/sidebar.php'); ?>
    <div class="dashboard-control">
        <?php
            if(isset($_GET['area'])) {
                if ($_GET['area'] == "brand") {
                    echo "<script>document.getElementById('nav-brand').classList.add('active');</script>";
                    require_once('controls/brand-list.php');
                } else if ($_GET['area'] == "brand-form") {
                    echo "<script>document.getElementById('nav-brand').classList.add('active');</script>";
                    require_once('controls/brand-form.php');
                } else if ($_GET['area'] == "vehicle") {
                    echo "<script>document.getElementById('nav-vehicle').classList.add('active');</script>";
                    require_once('controls/vehicle-list.php');
                } else if ($_GET['area'] == "vehicle-form") {
                    echo "<script>document.getElementById('nav-vehicle').classList.add('active');</script>";
                    require_once('controls/vehicle-form.php');
                } else if ($_GET['area'] == "chatbot") {
                    echo "<script>document.getElementById('nav-chatbot').classList.add('active');</script>";
                    require_once('controls/chatbot-list.php');
                } else if ($_GET['area'] == "chatbot-form") {
                    echo "<script>document.getElementById('nav-chatbot').classList.add('active');</script>";
                    require_once('controls/chatbot-form.php');
                } else {
                    echo "<h1 class='text-center mt-4'>Error 404 - Page not found</h1>";
                }
            } else {
                echo "<script>document.getElementById('nav-dashboard').classList.add('active');</script>";
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
</body>
</html>
