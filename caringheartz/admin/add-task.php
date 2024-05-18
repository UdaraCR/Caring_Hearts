<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
include('../executive-dashboard/dashboard-functions.php');

if (strlen($_SESSION['etmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

 $deptid=$_POST['deptid'];
 $emplist=$_POST['emplist'];
 $tpriority=$_POST['tpriority'];
 $ttitle=$_POST['ttitle'];
 $tdesc=$_POST['tdesc'];
 $tedate=$_POST['tedate'];
$sql="insert into tbltask(DeptID,AssignTaskto,TaskPriority,TaskTitle,TaskDescription,TaskEnddate)values(:deptid,:emplist,:tpriority,:ttitle,:tdesc,:tedate)";
$query=$dbh->prepare($sql);
$query->bindParam(':deptid',$deptid,PDO::PARAM_STR);
$query->bindParam(':emplist',$emplist,PDO::PARAM_STR);
$query->bindParam(':tpriority',$tpriority,PDO::PARAM_STR);
$query->bindParam(':ttitle',$ttitle,PDO::PARAM_STR);
$query->bindParam(':tdesc',$tdesc,PDO::PARAM_STR);
$query->bindParam(':tedate',$tedate,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
//       lets add action in table history
       insertTaskHistory($LastInsertId, $_SESSION['etmsaid'], 'admin', 'added new task');

    echo '<script>alert("Task has been added.")</script>';
echo "<script>window.location.href ='add-task.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Employee Task Management System || Add Task</title>
    
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
function getemp(val) {
$.ajax({
type: "POST",
url: "get_emp.php",
data:'deptid='+val,
success: function(data){
$("#emplist").html(data);
}
});
}
</script>

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
                              <h2>Add Task</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column8 graph">
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add Task</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                             <div class="alert alert-primary" role="alert">
                                                <form method="post">
                        <fieldset>
                            <div class="field">
                              <label class="label_field">Department Name</label>
                              <select type="text" name="deptid" id="deptid" onChange="getemp(this.value);" value="" class="form-control" required='true'>
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
                              <div class="field">
                              <label class="label_field">Employee List</label>
                              <select type="text" name="emplist" id="emplist" value="" class="form-control" required='true'>

                              </select>
                           </div>
                           </div>
                           <br>
                          <div class="field">
                              <div class="field">
                              <label class="label_field">Task Priority</label>
                              <select type="text" name="tpriority" value="" class="form-control" required='true'>
                                 <option value="">Select Task Priority</option>
                                 <option value="Normal">Normal</option>
                                 <option value="Medium">Medium</option>
                                 <option value="Urgent">Urgent</option>
                                 <option value="Most Urgent">Most Urgent</option>
                                
                              </select>
                           </div>
                           </div>
<br>
                           <div class="field">
                              <label class="label_field">Task Title</label>
                              <input type="text" name="ttitle" value="" class="form-control" required='true'>
                           </div>
                           <br>
                           <div class="field">
                              <label class="label_field">Task Description</label>
                              <textarea type="text" name="tdesc" value="" class="form-control" required='true'></textarea>
                           </div>
                           <br>
                            <div class="field">
                              <label class="label_field">Task End Date</label>
                                <input type="date" name="tedate" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime('today')); ?>" class="form-control" required="true">
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