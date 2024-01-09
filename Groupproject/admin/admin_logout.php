<?php
session_start();
if(isset($_SESSION["UID"])){
	unset($_SESSION["UID"]);
	unset($_SESSION["userName"]);	
	header("location:../index.php");
}	
?>