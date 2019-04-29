
<?php 
session_start();
        if(isset($_POST['Username'])){
				//connection
                  include("Connect.php");
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = md5($_POST['Password']);
				//query 
                  $sql="SELECT * FROM User Where Username='".$Username."'";

                  $result = mysqli_query($conn,$sql);
	
                  if(mysqli_num_rows($result)==1){ //เช็ค user
                      $row = mysqli_fetch_array($result);
                      
                      if($Password == $row["Password"]){ //เช็ค password
                         $_SESSION["UserID"] = $row["ID"];
                         $_SESSION["User"] = $row["Firstname"]." ".$row["Lastname"];
                         $_SESSION["Userlevel"] = $row["Userlevel"];
                        
                         $record = "INSERT INTO log (User_ID,Action) VALUES ('".$row['ID']."','Login:".$_SESSION["User"]."')";
                         mysqli_query($conn,$record);
                                                  
                      if($_SESSION["Userlevel"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
 
                        Header("Location: index.php");
                        
 
                      }

                      }else{
						echo "<script>";
                        echo "alert(\" password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
						echo "</script>";
					}
                     
                     
 
                  }else{
                    echo "<script>";
                        echo "alert(\" user  ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                  }
 
        }else{
             Header("Location: loginpage.html"); //user & password incorrect back to login again
 
        }


?>