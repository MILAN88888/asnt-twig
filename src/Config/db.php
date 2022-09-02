<?php
namespace twigasnt\asnt\Config;

class db
{
    private $conn;
 
	public function __construct()
	{      
		$serverName = "localhost";
		$userName = "root";
		$password = "";
	    $database= "asnt_pro3";   
		$this->conn = mysqli_connect($serverName, $userName, $password, $database);
	}
	public function getConnection()
	{
		return $this->conn;
	}
}
?>