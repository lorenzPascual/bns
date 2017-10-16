<?php

class Connection 
{
	 public function Connect()
	 {
	 	$this->conn = mysqli_connect("localhost","root","","buynsell");
	 	return $this->conn;
	 }	
}
?>