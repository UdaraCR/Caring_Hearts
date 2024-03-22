<?php
require_once("includes/dbconnection.php");
if(!empty($_POST["deptid"])) 
{
$deptid=$_POST["deptid"];
$sql=$dbh->prepare("SELECT * FROM tblemployee WHERE DepartmentID=:deptid");
$sql->execute(array(':deptid' => $deptid));	
?>
<option value="">Select Employee</option>
<?php
while($row =$sql->fetch())
{
?>
<option value="<?php echo $row["ID"]; ?>"><?php echo $row["EmpName"]; ?></option>
<?php
}
}
?>