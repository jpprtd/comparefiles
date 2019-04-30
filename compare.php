<?php
session_start();
if(!isset($_SESSION["UserID"])){
  Header("Location: loginpage.html");
}
include("Connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Upload Files - Compare Files</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <style type="text/css">
    .LockOn {
      display: block;
      visibility: visible;
      position: absolute;
      z-index: 999;
      top: 0px;
      left: 0px;
      width: 105%;
      height: 105%;
      background-color:white;
      vertical-align:bottom;
      padding-top: 20%; 
      filter: alpha(opacity=75); 
      opacity: 0.75; 
      font-size:large;
      color:blue;
      font-style:italic;
      font-weight:400;
      background-image: url("http://i.imgur.com/KUJoe.gif");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
    }
  </style>
</head>

<body id="page-top">

  <div id="coverScreen"  class="LockOn">
  </div>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Compare Files</sup></div>
      </a>

      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>My Files</span></a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item active">
          <a class="nav-link" href="upload.php">
            <i class="fa fa-upload fa-fw"></i>
            <span>Upload File</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="charts.html">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              <span>Activity Logs</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                <span>Logout</span></a>
              </li>

              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">

              <!-- Sidebar Toggler (Sidebar) -->
              <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
              </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

              <!-- Main Content -->
              <div id="content">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
                </button>

                <!-- End of Topbar -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Compare Files</h6>
                  </div>
                  <div class="card-body">
                   <!-- Begin Page Content -->
                   <div class="container-fluid">

                    <form method="POST" action="#" id="upload_form" enctype="multipart/form-data">
                      <!-- COMPONENT START -->
                      <div class="form-group">
                        <div class="input-group input-file" name="file">
                          <input type="text" class="form-control" id="input_file_txt" placeholder='Choose a file...' />
                        </div>
                      </div>
					  <div class="input-group input-file" name="compare_with2">
					  Compare with : 
					  </div>
					  <?php
						$sql="SELECT * FROM files ";
						$result = mysqli_query($conn,$sql);
						?>
					   <div class="input-group input-file" name="compare_with">
							<select class="form-control" id="file_c">
								<?php 
								while($row = mysqli_fetch_assoc($result)) {
									echo "<option value=".$row['files_id'].">".$row['files_name']."</option>";
								}?>
							</select>
                        </div>
                      </div>
                      <!-- COMPONENT END -->
					   <div class="input-group input-file" name="compare_wit3">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right" id="submit_btn" disabled>Submit</button>
                        <button type="reset" class="btn btn-danger" id="reset_btn">Reset</button>
                      </div>
					  </div>
                    </form>


                  </div>
                </div>

			  
			  
              <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; 591022 - Data Security (CS3663) 2/2019 HCU-051</span>
                </div>
              </div>
            </footer>
            <!-- End of Footer -->

          </div>
          <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary">แจ้งเตือน</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                อัพโหลดเสร็จสิ้น
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">ปิด</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="wrongModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="m-0 font-weight-bold text-primary">แจ้งเตือน</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                มีบางอย่างผิดพลาดโปรดลองใหม่อีกครั้ง
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">ปิด</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>


        <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/js/demo/datatables-demo.js"></script>

        <script type="text/javascript">
          function bs_input_file() {
            $(".input-file").before(
              function() {
                if ( ! $(this).prev().hasClass('input-ghost')) {
                  var element = $("<input type='file' class='input-ghost' id='my_file' name ='my_file' style='visibility:hidden; height:0'>");
                  element.attr("name",$(this).attr("name"));
                  element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                    $("#submit_btn").attr("disabled", false);
                  });
                  $(this).find("button.btn-choose").click(function(){
                    element.click();
                  });
                  $(this).find("button.btn-reset").click(function(){
                    element.val(null);
                    $(this).parents(".input-file").find('input').val('');
                    $("#submit_btn").attr("disabled", 'disabled');
                  });
                  $(this).find('input').css("cursor","pointer");
                  $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file').prev().click();
                    $("#submit_btn").attr("disabled", 'disabled');
                    return false;
                  });
                  return element;
                }
              }
              );
          }
          $(function() {
            $("#coverScreen").hide();
            bs_input_file();
            $("#reset_btn").click(function(){
              $("#submit_btn").attr("disabled", 'disabled');
            });
            $("#upload_form").submit(function(e){
              e.preventDefault();
              var formData = new FormData();
              formData.append('my_file',$("#my_file")[0].files[0]);
              formData.append('id',<?php echo $_SESSION['UserID']; ?>);
			  formData.append('file_c',$("#file_c").val());
              $("#coverScreen").show();
              $.ajax({
                url:'function_upload_compare.php',
                type:'post',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success:function(response){
                  console.log(response);
                  $("#input_file_txt").val('');
                  $("#my_file").val('');
                  $("#submit_btn").attr("disabled", 'disabled');
                  $("#coverScreen").hide();
				  if(response['compare'] == "1"){
					alert("ไฟล์ทั้งสองมีค่า Hash ตรงกัน");
				  }else{
					alert("ไฟลทั้งสองมีค่า Hash ไม่ตรงกัน");
				  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  console.log("textStatus : " + textStatus);
                  console.log("errorThrown : " +  errorThrown);
                  console.log("jqXHR : " +  jqXHR['responseText']);
                  $("#coverScreen").hide();
                  $('#wrongModal').modal('show');
                }
              });
            });
          });
          </script>
        </body>

        </html>
