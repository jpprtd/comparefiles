<?php
session_start();
	if(!isset($_SESSION["UserID"])){
		Header("Location: loginpage.html");
	}
include("Connect.php");



$file_url = 'uploads/'.$_GET['files_name'];


if (file_exists($file_url)) {
    $record = "INSERT INTO log (User_ID,Action) VALUES ('".$_SESSION["UserID"]."','Download: ".$file_url."')";
    mysqli_query($conn,$record);
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
    readfile($file_url);
}
?>