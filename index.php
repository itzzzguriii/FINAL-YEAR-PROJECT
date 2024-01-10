<?php
session_start();
if(isset($_SESSION['UserId']) && !empty($_SESSION['UserId'])){
    echo '<script>location.href = \'home.php\';</script>';
}
else{
    echo '<script>location.href = \'login.php\';</script>';
}
?>