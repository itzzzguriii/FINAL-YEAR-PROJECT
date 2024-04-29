<?php
	// Retrieve user input
	$Name = $_GET["Name"];
    $Email = $_GET["Email"];
	$Password = $_GET["Password"];
	//Checking for Empty Fields
	if(empty($Name) || empty($Email) || empty($Password)){
		echo "Please fill all Fields";
		return;
	}
    // Include the database context file
	require_once("dbContext.php");
	$dbContext = new DBContext();

	// Check if the email already exists in the database
	$sql = "SELECT * FROM users WHERE Email='$Email'";
    if($dbContext->numRows($sql) > 0)
		echo "Email Already Exist";
	else {
		// Insert user data into the database
		$sql = "INSERT INTO users(`Name`, `Email`, `Password`, `accessType`) VALUES('$Name', '$Email', '$Password', 'user')";
		if($dbContext->ExecuteNonQuery($sql))
			echo "Registered sucessfully";
		else
			echo $dbContext->getError();
	}
?>


