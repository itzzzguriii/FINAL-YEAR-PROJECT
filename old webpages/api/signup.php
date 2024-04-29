<?php
	$Name = $_GET["Name"];
    $Email = $_GET["Email"];
	$Password = $_GET["Password"];
	//Checking for Empty Fields
	if(empty($Name) || empty($Email) || empty($Password)){
		echo "Please fill all Fields";
		return;
	}
    //PHP
	require_once("dbContext.php");
	$dbContext = new DBContext();

	$sql = "SELECT * FROM users WHERE Email='$Email'";
    if($dbContext->numRows($sql) > 0)
		echo "Email Already Exist";
	else {
		$sql = "INSERT INTO users(`Name`, `Email`, `Password`) VALUES('$Name', '$Email', '$Password')";
		if($dbContext->ExecuteNonQuery($sql))
			echo "Registered sucessfully";
		else
			echo $dbContext->getError();
	}
?>