<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/AutoElectrik/api/dbContext.php'); $db_handle = new DBContext();
session_start();
if(!isset($_SESSION['UserId']) || empty($_SESSION['UserId'])){
    echo '<script>location.href = \'login.php\';</script>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('include/head.php'); ?>
<link rel="stylesheet" href="css/chatbot.css">
<body class="normalBody" onload="setActive('nav_help')" style="height: 100vh; background: white;">
    <?php include('include/navbar.php'); ?>
    <div class="chat-container">
        <div class="chat-box" id="chatBox">
            <!-- Bot messages will appear here -->
        </div>
        <div class="input-box" id="messageList">
            <!-- Questions will appear here -->
            <?php
                $questions = $db_handle->ExecuteForDataTable("SELECT Id, question FROM chatbot WHERE parentId = 0");
                if (!empty($questions)) { 
                    foreach($questions as $key=>$value){
                        echo "<div readonly class='message-link' data-id='".$questions[$key]["Id"]."' data-message='".$questions[$key]["question"]."'>" . $questions[$key]["question"]. "</div>";
                    }
                } else {
                    echo "<div>No questions found</div>";
                }
            ?>
        </div>
    </div>
    <script src="js/chatbot.js"></script>
</body>
</html>