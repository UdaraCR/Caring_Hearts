<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['etmsaid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      
      <title>Caregiver Task Management System || View New Task</title>
   
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
      <!-- fancy box js -->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
      
   </head>
   <body class="inner_page tables_page">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
          <?php include_once('includes/sidebar.php');?>
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
                              <h2>Task Details</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row">
                     
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Task Details</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <?php
                                           $vid=$_GET['viewid'];
$sql="SELECT tbltask.ID as tid,tbltask.TaskTitle,tbltask.TaskDescription,tbltask.TaskPriority,tbltask.TaskEnddate,tbltask.Status,tbltask.WorkCompleted,tbltask.Remark,tbltask.UpdationDate,tbltask.DeptID,tbltask.AssignTaskto,tbltask.TaskEnddate,tbltask.TaskAssigndate,tbldepartment.DepartmentName,tbldepartment.ID as did,tblemployee.EmpName,tblemployee.EmpId from tbltask join tbldepartment on tbldepartment.ID=tbltask.DeptID join tblemployee on tblemployee.ID=tbltask.AssignTaskto where tbltask.ID=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?> 
                                     <table class="table table-bordered" style="color:#000">
                                    <tr>
    <th colspan="6" style="color: orange;font-weight: bold;font-size: 20px;text-align: center;">Task Details </th>
  </tr>
  <tr>
    <th>Task Title</th>
    <td><?php  echo $row->TaskTitle;?></td>
     <th>Task Priority</th>
    <td><?php  echo $row->TaskPriority;?></td>
  </tr>
  <tr>
    <th>Task Description</th>
    <td colspan="3"><?php  echo $row->TaskDescription;?></td>
 </tr>
 <tr>
     <th>Task Assign Date</th>
    <td colspan="3"><?php  echo $row->TaskAssigndate;?></td>
  </tr>

 <tr>
     <th>Task Finish Date</th>
    <td colspan="3"><?php  echo $row->TaskEnddate;?></td>
  </tr>

  <tr>
     
         <th>Employee Final Remark</th>
    <?php if($row->Status==""){ ?>

                     <td  colspan="4"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  
  <td colspan="4"><?php  echo htmlentities($row->Remark);?>
                  </td>
  </tr>

  <tr>
   
    <th>Task Final Status</th>
   <td colspan="3"> <?php  $status=$row->Status;
    
if($row->Status=="Inprogress")
{
  echo "In Progress";
}

if($row->Status=="Completed")
{
 echo "Completed";
}


if($row->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>

                  <?php } ?>  

  </tr>

  <?php $cnt=$cnt+1;}} ?>
</table>

<?php 
$vid=$_GET['viewid']; 
   if($status!=""){
$ret="select tbltasktracking.Remark,tbltasktracking.Status,tbltasktracking.UpdationDate,tbltasktracking.WorkCompleted,tbltasktracking.TaskID from tbltasktracking where tbltasktracking.TaskID =:vid";
$query = $dbh -> prepare($ret);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="color: #000;border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="5" style="color:" >Task  History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Task Progress</th>
<th>Time</th>
</tr>
<?php  
foreach($results as $row)
{               ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row->Remark;?></td> 
  <td><?php  echo $row->Status;
?></td> 
<td>
<span class="skill" style="width:90%;">Task Progress<span class="info_valume"><?php  echo $row->WorkCompleted;?>%</span> </span>

   <div class="progress skill-bar ">
                                       <div class="progress-bar progress-bar-animated progress-bar-striped" role="progressbar" aria-valuenow="<?php  echo $row->WorkCompleted;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo $row->WorkCompleted;?>%;"></div>
                                    </div></td>
   <td><?php  echo $row->UpdationDate;?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
?>



</div> 
                                 </div>
                              </div>
                           </div>
                        </div>
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
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html><?php } ?>