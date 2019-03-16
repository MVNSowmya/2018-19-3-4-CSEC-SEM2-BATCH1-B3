<?php
require('db.php');
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Cancel Leave Requests</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">
  function disable()
    {
        document.getElementById("button").style.display = "none";
        
  }</script>
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
border-spacing:2px;
  

}

th {
background-color:pink;
 
  text-align: left;
  padding: 8px;
}

td {
  
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
button{
  border-radius: 5px;
  font-size: 16px;
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


<?php 
if(isset($_REQUEST['approve'])){
   
  
  $status="Approved";
  $id=$_REQUEST['id'];
  $applydate=$_REQUEST['applydate'];
  $name=$_REQUEST['name'];
  $leavetype=$_REQUEST['leavetype'];
  $days=$_REQUEST['days'];
  $purpose=$_REQUEST['purpose'];
  $q="update cancelleave set status='$status' where id='$id' and applydate='$applydate' and name='$name' and reason='$purpose'";
  $r=mysqli_query($con,$q);
  $q1="select * from userinfo where id='$id'";
  $q11=mysqli_query($con,$q1);
  while($row=mysqli_fetch_assoc($q11)){
    if($leavetype!="OneHourPermission"){
        
        $v=$row[$leavetype];
        $re=$v+$days;
        echo $leavetype;
        
        if($row['extraleave'] > 0){
          $e=$row['extraleave'] - $days;
        $e1="update userinfo set extraleave='$e' where id='$id'";
        $e11=mysqli_query($con,$e1); }

       if($leavetype=="CasualLeave"){ 
        $q2="update userinfo set CasualLeave='$re' where id='$id'";
        $ree=mysqli_query($con,$q2); 
       }
       elseif($leavetype=="EarnedLeave"){
         $q2="update userinfo set EarnedLeave='$re' where id='$id'";
        $ree=mysqli_query($con,$q2); 
       }
       elseif($leavetype=="SickLeave"){
         $q2="update userinfo set SickLeave='$re' where id='$id'";
        $ree=mysqli_query($con,$q2); 
       }
       else{
         $q2="update userinfo set NonVacationLeave='$re' where id='$id'";
        $ree=mysqli_query($con,$q2); 
       }
      
        
      
    }
    
  }
  
  
    
  }
  
if(isset($_REQUEST['reject'])){
  
 
  $status="Rejected";
  $id=$_REQUEST['id'];
  $applydate=$_REQUEST['applydate'];
  $name=$_REQUEST['name'];
  $leavetype=$_REQUEST['leavetype'];
  $days=$_REQUEST['days'];
  $purpose=$_REQUEST['purpose'];
  $q="update cancelleave set status='$status' where id='$id' and applydate='$applydate' and name='$name' and reason='$purpose'";
  $r=mysqli_query($con,$q);
  

}
   
?>

<ul id="navmenu">
    <li><a href="hodprofile.php">View Profile</a>
      
     </li>
     <li><a href="Know Calendar.php">Know Calendar</a>
      
     </li>
     <li><a href="#">View Requests</a>
          <ul class="sub1">
             <li><a href="hodfacultyrequest.php">Faculty</a>
                 
             </li>
             <li><a href="hodstaffrequest.php">Staff</a>
                 
             </li>
             
         </ul>
     </li>

    <li><a href="hodviewcancelleaves.php">View Cancel Leaves</a>
          
     </li>

    <li><a href="#">View Details</a>
          <ul class="sub1">
             <li><a href="hodfacultyreport.php">Faculty</a>
                 
             </li>
             <li><a href="hodstaffreport.php">Staff</a>
                 
             </li>
             
         </ul>
     </li>

    <li><a href="logout.php">Log Out</a></li>
    
</ul>


<br><br><br>

<h2> Cancel Leave Requests</h2>

   
<table>
  <thead>
  <tr>
    
    <th  rowspan="2">Apply Date</th>
    <th  rowspan="2">ID</th>
    
    <th  rowspan="2">Leave Type</th>
    <th rowspan="2">Reason</th>
    <th  rowspan="2">Decision</th>
    <th  rowspan="2">Action</th>
    
  </tr>
 </thead>
 <tbody>
  <?php
 $i=1;

$dept=$_SESSION['department'];
$sql="SELECT * FROM cancelleave where department='$dept'";
$result=mysqli_query($con, $sql);

$count=mysqli_num_rows($result);

if($count>0){
  while ($row=mysqli_fetch_array($result)) {
    
  

    ?>
    <tr>

      <td><?php echo $row['applydate']; ?></td>
      <td><?php echo $row['id']; ?></td>
      
      <td><?php echo $row['leavetype']; ?></td>
       <td><div class="dropdown"><span><?php echo $row['reason']; ?></span><div class="dropdown-content">
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
     <th rowspan="2">Reason</th>
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
    <td><?php echo $row['reason']; ?></td>
    <td><?php echo $row['status']; ?></td>
  </tr>
</tbody>
</table>
     </div>
</div></td>
      <td style="color: green;"><?php echo $row['status']; ?></td>
      <td><form method="post"><input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="hidden" name="applydate" value="<?php echo $row['applydate'];?>">
                            <input type="hidden" name="name" value="<?php echo $row['name'];?>">
                            <input type="hidden" name="days" value="<?php echo $row['days'];?>">
                            <input type="hidden" name="leavetype" value="<?php echo $row['leavetype'];?>">
                            <input type="hidden" name="purpose" value="<?php echo $row['reason'];?>">
        <button type="submit" name="approve" id="button" onClick="return confirm('Do you want to continue?')">Approve</button><button type="submit" name="reject" id="button" onClick="return confirm('Do you want to continue?')">X&nbspReject</button></form></td>
    </tr>
    <?php $i++;}}else{echo "No Record Found!";} ?>
 </tbody>
</table>
</body>
</html>

