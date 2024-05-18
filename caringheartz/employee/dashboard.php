<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['etmsempid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      
      <title>Caregiver Task Management System||Dashboard</title>
      
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
      
   </head>
   <body class="dashboard dashboard_1">
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
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 red_bg">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-files-o white_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <?php
                                 $eid=$_SESSION['etmsempid']; 
                        $sql2 ="SELECT * from  tbltask where Status is null && AssignTaskto=:eid";
$query2 = $dbh -> prepare($sql2);
$query2-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$newtask=$query2->rowCount();
?>
                                 <div>
                                    <a href="new-task.php">
                                    <p class="total_no"><?php echo htmlentities($newtask);?></p>
                                    <p class="head_couter" style="color:#000">New Tasks</p>
                                 </a>

                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 yellow_bg">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-files-o blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <?php 
                                 $eid=$_SESSION['etmsempid']; 
                        $sql3 ="SELECT * from  tbltask where Status='Inprogress' && AssignTaskto=:eid";
$query3 = $dbh -> prepare($sql3);
$query3-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$inprotask=$query3->rowCount();
?>
                                 <div><a href="inprogress-task.php">
                                    <p class="total_no"><?php echo htmlentities($inprotask);?></p>
                                    <p class="head_couter" style="color:#000">Inprogress Task</p>
                                 </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 green_bg">
                              <div class="couter_icon">
                                 <div> 
                                   <i class="fa fa-files-o white_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <?php 
                        $sql4 ="SELECT * from  tbltask where Status='Completed' && AssignTaskto=:eid";
$query4 = $dbh -> prepare($sql4);
$query4-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$comptask=$query4->rowCount();
?><a href="completed-task.php">
                                    <p class="total_no"><?php echo htmlentities($comptask);?></p>
                                    <p class="head_couter" style="color:#000">Completed Task</p>
                                 </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        


<div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30 blue1_bg">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-files-o"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                          <?php 
                        $sql5 ="SELECT * from  tbltask where  AssignTaskto=:eid";
$query5 = $dbh -> prepare($sql5);
$query5-> bindParam(':eid', $eid, PDO::PARAM_STR);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$alltasks=$query5->rowCount();
?><a href="all-task.php">
                                    <p class="total_no"><?php echo htmlentities($alltasks);?></p>
                                    <p class="head_couter" style="color:#000">All Tasks </p>
                                 </a>
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
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html><?php } ?>