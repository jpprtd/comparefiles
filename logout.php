
<?php
session_start();
include("Connect.php");
$record = "INSERT INTO log (User_ID,Action) VALUES ('".$_SESSION["UserID"]."','Logout:".$_SESSION["User"]."')";
mysqli_query($conn,$record);
session_destroy();
header("Location: index.php");
/*$logout = "SELECT * FROM user Where ID = '".$_SESSION["UserID"]."' ";
$result = mysqli_query($conn,$logout);
$row = mysqli_fetch_array($result);

if(is_array($row))
    {
      	$record = "INSERT INTO log (User_ID,Action) VALUES ('".$row['ID']."','Logout')";

        if ($conn->query($record) === TRUE) 
        {
            echo "Record updated successfully";
            session_destroy();
			header("Location: index.php");	

        } 

        else 
        {
            echo "Error updating record: " . $conn->error;
        }
         
	}*/
	?>