<div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="dashboard.php"><h3 style="color: white;padding-top: 20px;padding-left: 10px;">Employee Task Management System</h3></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <?php 
                        $sql2 ="SELECT * from  tbltask where Status is null";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$newtask=$query2->rowCount();
?>
                                 <li><a href="new-task.php"><i class="fa fa-bell-o"></i><span class="badge"><?php echo htmlentities($newtask);?></span></a></li>
                                 
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <?php
$eid=$_SESSION['etmsempid'];
$sql="SELECT EmpName,EmpId from  tblemployee where ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user"><?php  echo $row->EmpName;?>(<?php  echo $row->EmpId;?>)</span></a><?php $cnt=$cnt+1;}} ?>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.php">My Profile</a>
                                       <a class="dropdown-item" href="change-password.php">Settings</a>
                                       <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>