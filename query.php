<?php
    require_once("dbContext.php");
    $dbContext = new DBContext();

    // Check if question ID is provided
    if(isset($_GET['Id'])) {
        // Retrieve question ID from URL
        $question_id = $_GET['Id'];

        $answer = $dbContext->getFirstRow("SELECT answer FROM chatbot WHERE Id=$question_id")["answer"];

        // Check for any new questions related to this question
        $newQuestions = '';

        $subResult = $dbContext->ExecuteForDataTable("SELECT Id, question FROM chatbot WHERE parentId=$question_id");
        if (!empty($subResult)) { 
            foreach($subResult as $key=>$value){
                $newQuestions .= "<div readonly class='message-link' data-id='".$subResult[$key]["Id"]."'>" . $subResult[$key]["question"]. "</div>";
            }
        }
        header('new-questions: ' . $newQuestions);

        $startQuestions = '';
        $questions = $dbContext->ExecuteForDataTable("SELECT Id, question FROM chatbot WHERE parentId = 0");
        if (!empty($questions)) { 
            foreach($questions as $key=>$value){
                $startQuestions .= "<div readonly class='message-link' data-id='".$questions[$key]["Id"]."'>" . $questions[$key]["question"]. "</div>";
            }
        }
        header('start-questions: ' . $startQuestions);

        // Output the answer
        echo $answer;

    } else {
        echo "Response Error.";
    }
?>