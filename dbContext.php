<?php
class DBContext {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	public $database = "autoelectrik";
	public $con;
	
	function ExecuteNonQuery($sql) {
		$this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return mysqli_query($this->con,$sql);
	}
	function ExecuteForDataTable($sql) {
		$resultset = [];
		$this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		$result = mysqli_query($this->con,$sql);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
        return $resultset;
	}
	function getFirstRow($sql) {
		$this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		$result = mysqli_query($this->con,$sql);
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	function numRows($sql) {
		$this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		$result  = mysqli_query($this->con,$sql);
		$count = mysqli_num_rows($result);
		return $count;	
	}
	function getError(){
		return mysqli_error($this->con);
	}
}
?>