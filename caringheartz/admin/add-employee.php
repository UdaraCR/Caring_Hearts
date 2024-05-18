<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['etmsaid']==0)) {
  header('location:picut.php');
  } else{
    if(isset($_POST['submit']))
  {

$etmsaid=$_SESSION['etmsaid'];
 $deptname=$_POST['deptname'];
 $empid=$_POST['empid'];
 $empname=$_POST['empname'];
 $empemail=$_POST['empemail'];
 $empcontno=$_POST['empcontno'];
 $designation=$_POST['designation'];
 $empdob=$_POST['empdob'];
 $empadd=$_POST['empadd'];
 $empdoj=$_POST['empdoj'];
 $desc=$_POST['desc'];
 $password=md5($_POST['password']);
$pic=$_FILES["pic"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");

$sql ="SELECT ID FROM tblemployee WHERE EmpId=:empid || EmpContactNumber=:empcontno || EmpEmail=:empemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':empid', $empid, PDO::PARAM_STR);
$query-> bindParam(':empemail', $empemail, PDO::PARAM_STR);
$query-> bindParam(':empcontno', $empcontno, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0){
echo "<script>alert('Employee Id or Email or Contact number alreadery registered with another emplyee');</script>";

   } else{

if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Pic has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$pic=md5($pic).time().$extension;
 move_uploaded_file($_FILES["pic"]["tmp_name"],"images/".$pic);



$sql="insert into tblemployee(DepartmentID,EmpId,EmpName,EmpEmail,EmpContactNumber,Designation,EmpDateofbirth,EmpAddress,EmpDateofjoining,Description,Password,ProfilePic)values(:deptname,:empid,:empname,:empemail,:empcontno,:designation,:empdob,:empadd,:empdoj,:desc,:password,:pic)";
$query=$dbh->prepare($sql);
$query->bindParam(':deptname',$deptname,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':empname',$empname,PDO::PARAM_STR);
$query->bindParam(':empemail',$empemail,PDO::PARAM_STR);
$query->bindParam(':empcontno',$empcontno,PDO::PARAM_STR);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':empdob',$empdob,PDO::PARAM_STR);
$query->bindParam(':empadd',$empadd,PDO::PARAM_STR);
$query->bindParam(':empdoj',$empdoj,PDO::PARAM_STR);
$query->bindParam(':desc',$desc,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':pic',$pic,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Employee detail has been added.")</script>';
echo "<script>window.location.href ='add-employee.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Caregiver Task Management System || Add Department</title>
    
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
<script type="text/javascript">
function checkempidAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'empid='+$("#empid").val(),
type: "POST",
success:function(data){
$("#empid-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
// FOr email
function checkemailidAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'empemail='+$("#empemail").val(),
type: "POST",
success:function(data){
$("#empemail-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}


// For Mobile
function checkmobileAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'empcontno='+$("#empcontno").val(),
type: "POST",
success:function(data){
$("#empcontno-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
   </head>
   <body class="inner_page general_elements">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
           <?php include_once('includes/sidebar.php');?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include_once('includes/header.php');?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Add Employee</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column8 graph">
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Employee</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                             <div class="alert alert-primary" role="alert">
                                                <form method="post" enctype="multipart/form-data">
                        <fieldset>
                            
                           <div class="field">
                              <label class="label_field">Department Name</label>
                              <select type="text" name="deptname" value="" class="form-control" required='true'>
                                 <option value="">Select Department</option>
                                  <?php 

$sql2 = "SELECT * from   tbldepartment ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row2)
{          
    ?>  
   
<option value="<?php echo htmlentities($row2->ID);?>"><?php echo htmlentities($row2->DepartmentName
    );?></option>
 <?php } ?>
                              </select>
                           </div>
                          

                           <br>

                           <div class="field">
                              <label class="label_field">Employee ID</label>
                              <input type="text" name="empid" id="empid" value="" class="form-control" required='true' onBlur="checkempidAvailability()">
                             
                           </div>
                           <span id="empid-status"></span>

                           <br>
                           <div class="field">
                              <label class="label_field">Employee Name</label>
                              <input type="text" name="empname" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Employee Email</label>
                              <input type="email" name="empemail" id="empemail" value="" class="form-control" required='true' onBlur="checkemailidAvailability()">
                           </div>
                          <span id="empemail-status"></span>

                           <br>
                           <div class="field"> 
                              <label class="label_field">Employee Contact Number</label>
                              <input type="text" name="empcontno" id="empcontno" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+" onBlur="checkmobileAvailability()">
                           </div>
                            <span id="empcontno-status"></span>
                          <br>
                           <div class="field">
                              <label class="label_field">Employee Designation</label>
                              <input type="text" name="designation" value="" class="form-control" required='true'>
                           </div>

                           <br>
                           <div class="field">
                              <label class="label_field">Employee Date of Birth</label>
                              <input type="date" name="empdob" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Empoyee Address</label>
                              <textarea type="text" name="empadd" value="" class="form-control" required='true'></textarea>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Empoyee Date of Joining</label>
                              <input type="date" name="empdoj" value="" class="form-control" required='true'>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Description(if any)</label>
                              <textarea type="text" name="desc" value="" class="form-control"></textarea>
                           </div>
                          

                           <br>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="text" name="password" value="" class="form-control" required='true'>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Employee Pic</label>
                              <input type="file" name="pic" value="" class="form-control" required='true'>
                           </div>

                           <br>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt" type="submit" name="submit" id="submit">Add</button>
                           </div>
                        </fieldset>
                     </form></div>
                                            
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- funcation section -->
                     
                     </div>
                  </div>
                  <!-- footer -->
                 <?php include_once('includes/footer.php');?>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
    
      </div>
      <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js">
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html><?php } ?>