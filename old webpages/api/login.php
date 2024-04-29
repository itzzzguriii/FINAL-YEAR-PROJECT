<?php
	$Email = $_GET["Email"];
	$Password = $_GET["Password"];
	require_once("dbContext.php");
	$dbContext = new DBContext();
	$sql = "SELECT * FROM Users WHERE Email='$Email' AND Password='$Password'";
	if($dbContext->numRows($sql) == 1)
	{
		$row = $dbContext->getFirstRow($sql);
		session_start();
		$_SESSION['UserId'] = $row['userId'];
		$_SESSION['Email'] = $row['Email'];
		echo "true";
	}
	else
		echo "In-Valid Email or Password";
?>