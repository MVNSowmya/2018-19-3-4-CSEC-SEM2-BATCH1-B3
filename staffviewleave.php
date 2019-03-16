<?php
require('db.php');
session_start();
if(isset($_REQUEST['cancel'])){
  $leavetype=$_REQUEST['leavetype'];
  $status=$_REQUEST['status'];
  if($leavetype=="OneHourPermission"){
    $message="OneHourPermissions are not allowed for cancellation";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  elseif($status=="Pending"){
    $message="Leaves in pending are not allowed for cancellation";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else{
    header("Location:staffcancel.php");
  }
    
}
?>
<html>
<head>
	
<title>View Leave</title>
<style>

ul#navmenu,ul.sub1 {
       list-style-type: none;
       font-size: 9pt;
       position: absolute;
       z-index: 11;
  }
 
 ul#navmenu li{
    
    width: 130px;
    text-align: center;
    position: relative;
    float: left;
    margin-right: 4px;
    
 }
ul#navmenu{width:100%;}

 ul#navmenu a{
    text-decoration: none;
    display: block;
    width:130px;
    height: 25px;
    line-height: 25px;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 5px;
}
 ul#navmenu .sub1 a {
         margin-top: 5px;
    }
ul#navmenu ul.sub1 {
         display: none;
         position: absolute;
         top: 26px;
         left: 0px;
  }

 
 ul#navmenu li:hover > a {
         background-color: #CFC;
 }
 ul#navmenu li:hover a:hover {
         background-color: #FF0;
   }
 
 ul#navmenu li:hover .sub1 {
        display: block;
      }
table {
  font-family: arial, sans-serif;
  padding:15px;
  width: 100%;
border-spacing:1px;
  

}

th {
background-color:pink;
  border: 1px solid brown;
  text-align: left;
  padding: 8px;
}

td {
  border: 1px solid indigo;
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.dropdown {
    position: relative;

    color:blue;
    
}

.dropdown-content {
    display: none;
    position: absolute;
    right:-350px;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
    color:black;
}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>
</head>
<body>

<ul id="navmenu">
     <li><a href="staffprofile.php">View Profile</a>
      
     </li>
     <li><a href="staffplanmyleave.php">PlanMyLeave</a>
      
     </li>

<li><a href="staffleavereport.php">Leave Report</a>
      
     </li>

    <li><a href="staffviewleave.php">View Leaves</a>
          
     </li>
     <li><a href="staffviewcancelleaves.php">View Cancel Leaves</a>
          
     </li>

    <li><a href="#">Apply Leave</a>
        <ul class="sub1">
             <li><a href="Casualstaff.php" target="_blank">Casual Leave</a>
                 
             </li>
             <li><a href="Earnedstaff.php" target="_blank">Earned Leave</a>
                 
             </li>
             <li><a href="Sickleave.php" target="_blank">Sick Leave</a>
                 
             </li>
             <li><a href="Academicleave.php" target="_blank">Academic Leave</a>
                 
             </li>
             
             <li><a href="onehourstaff.php" target="_blank">One Hour Permission</a>
                 
             </li>
         </ul> 
     </li>

    <li><a href="logout.php">Log Out</a></li>
    
</ul>
<br><br><br>

<table>
  <thead>
  <tr>
    
    <th  rowspan="2">Apply Date</th>
    <th  rowspan="2">Leave Type</th>
    <th rowspan="2">Purpose</th>
    <th  rowspan="2">Decision</th>
    <th  rowspan="2">Action</th>
    
  </tr>
 </thead>
 <tbody>
  <?php
 $i=1;

$id=$_SESSION['id'];
 $sql="SELECT * FROM staffleave where id='$id'";
$result=mysqli_query($con, $sql);

$count=mysqli_num_rows($result);

if($count>0){
  while ($row=mysqli_fetch_array($result)) {
    
  

    ?>
    <tr>

      <td><?php echo $row['applydate']; ?></td>
      <td><?php echo $row['leavetype']; ?></td>
     <td><div class="dropdown"><span><?php echo $row['purpose']; ?></span><div class="dropdown-content">
       <table>
  <thead>
  <tr>
    
    <th  rowspan="2">Name</th>
    <th  rowspan="2">Department</th>
    <th rowspan="2">Id</th>
    <th  rowspan="2">ApplyDate</th>
    <th  rowspan="2">LeaveType</th>    
    <th  rowspan="2">Days</th>
    <th  rowspan="2">FromDate</th>
    <th rowspan="2">ToDate</th>
     <th rowspan="2">Purpose</th>
    <th  rowspan="2">OnDate</th>
    <th  rowspan="2">Time</th>
    <th  rowspan="2">Status</th>
  
  </tr>
 </thead>
 <tbody>

  <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['department']; ?></td>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['applydate']; ?></td>
    <td><?php echo $row['leavetype']; ?></td>
    <td><?php echo $row['days']; ?></td>
    <td><?php echo $row['fromdate']; ?></td>
    <td><?php echo $row['todate']; ?></td>
    <td><?php echo $row['purpose']; ?></td>
    <td><?php echo $row['ondate']; ?></td>
    <td><?php echo $row['time']; ?></td>
    <td><?php echo $row['status']; ?></td>
  </tr>
</tbody>
</table>
     </div>
</div></td>
      <td style="color: green;"><?php echo $row['status']; ?></td>
      <td style="padding-top: 8px;"><form method="post"><input type="hidden" name="id" value="<?php echo $row['id'];?>">
                           <input type="hidden" name="leavetype" value="<?php echo $row['leavetype'];?>">
                            <input type="hidden" name="status" value="<?php echo $row['status'];?>">
        <button type="submit" name="cancel" id="button">Cancel</button></form></td>
    </tr>
    <?php $i++;}}else{echo "No Record Found!";} ?>
 </tbody>
</table>
</body>
</html>
