<?php
session_start();
	if(!isset($_SESSION["UserID"])){
		Header("Location: loginpage.html");
	}
include("Connect.php");

$sql="SELECT * FROM files Where files_id = '".$_POST['file_c']."'";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($result);
$result = $result['files_hash'];
	
$targetFolder = 'uploads/';

if (!empty($_FILES)) {
	$tempFile = $_FILES['my_file']['tmp_name'];
	$targetPath = dirname(__FILE__) . '/' . $targetFolder;
	$fname = trim($_FILES['my_file']['name']);
	$fname = randomString()."-".$fname;
	$targetFile = rtrim($targetPath,'/') . '/' . $fname;
	
	// Validate the file type
	$fileTypes = array('html','php','css','js','bat');
	$fileParts = pathinfo($_FILES['my_file']['name']);
	$response = array ();
	if (!in_array($fileParts['extension'],$fileTypes)) {
		if(move_uploaded_file($tempFile,$targetFile)){
			$response['success'] = 1;
			foreach ($_POST as $key => $value){
				$response[$key] = $value;
			}
			$files_hash = hash_file('md5', $targetFile);
			$id = $_POST['id'];
			$sql = "INSERT INTO files (files_name , files_hash , user_id) VALUES ('$fname','$files_hash','$id')";
			mysqli_query($conn,$sql);
			
			if($result == $files_hash){
				$response['compare'] = 1;
			}else{
				$response['compare'] = 0;
			}
			echo json_encode($response);
		}else{
			$response['success'] = 0;
			$response['error'] = 'Upload failed.';
			echo json_encode($response);	
		}
	} else {
		$response['success'] = 0;
		$response['error'] = 'Invalid file type.';
		echo json_encode($response);
	}
}

function randomString() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
?>