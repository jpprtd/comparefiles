<?php
session_start();
	if(!isset($_SESSION["UserID"])){
		Header("Location: loginpage.html");
	}
include("Connect.php");

$file_url = 'uploads/'.$_GET['files_name'];


	$sth = "DELETE FROM files WHERE files_id = ".$_GET['id'];
    mysqli_query($conn,$sth);
    @unlink($file_url);

    $record = "INSERT INTO log (User_ID,Action) VALUES ('".$_SESSION["UserID"]."','Delete: ".$file_url."')";
    mysqli_query($conn,$record);
    
    Header("Location: index.php");

?>