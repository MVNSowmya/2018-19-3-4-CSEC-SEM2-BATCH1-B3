<?php
require('db.php');
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Faculty Leave Request</title>
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
  $q="update facultyleave set status='$status' where id='$id' and applydate='$applydate' and name='$name' and purpose='$purpose'";
  $r=mysqli_query($con,$q);
  $q1="select * from userinfo where id='$id'";
  $q11=mysqli_query($con,$q1);
  while($row=mysqli_fetch_assoc($q11)){
    if($leavetype!="OneHourPermission"){
      
        $v=$row[$leavetype];
        $re=$v-$days;
        
        //$q2="update userinfo set '$leavetype'='$re' where id='$id'";
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
    if($leavetype=="OneHourPermission"){
      $c=$row['count'] + 1;
      $c1="update userinfo set count='$c' where id='$id'";
      $c11=mysqli_query($con,$c1);
      $count=$row['count'];
      if(($count % 2)==0){
        $o=$row['OneHourPermission'] + 0.5;
         $c2="update userinfo set OneHourPermission='$o' where id='$id'";
         $c22=mysqli_query($con,$c2);
      }
    }
  }
  
   $q2="select * from userinfo where id='$id'";
  $q12=mysqli_query($con,$q2);
  while($rows=mysqli_fetch_assoc($q12)){
        $e=0;
        if($rows["CasualLeave"]<0){$e=$e-$rows["CasualLeave"];}
        if($rows["EarnedLeave"]<0){$e=$e-$rows["EarnedLeave"];}
        if($rows["SickLeave"]<0){$e=$e-$rows["SickLeave"];}
        if($rows["NonVacationLeave"]<0){$e=$e-$rows["NonVacationLeave"];}
        $e1="update userinfo set extraleave='$e' where id='$id'";
        $e11=mysqli_query($con,$e1);
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
  $q="update facultyleave set status='$status' where id='$id' and applydate='$applydate' and name='$name' and purpose='$purpose'";
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

<h2> Faculty Leave Requests</h2>

   
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
    <th  rowspan="2">Action</th>
    
  </tr>
 </thead>
 <tbody>
  <?php
 $i=1;

$dept=$_SESSION['department'];
$sql="SELECT * FROM facultyleave where department='$dept'";
$result=mysqli_query($con, $sql);

$count=mysqli_num_rows($result);

if($count>0){
  while ($row=mysqli_fetch_array($result)) {
    
  

    ?>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['department']; ?></td>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['applydate']; ?></td>
      <td><?php echo $row['leavetype']; ?></td>
      <td><?php echo $row['days']; ?></td>
      <td><?php echo $row['fromdate']; ?></td>
      <td><?php echo $row['todate']; ?></td>
       <td><div class="dropdown"><span><?php echo $row['purpose']; ?></span><div class="dropdown-content">
       <table>
  <thead>
  <tr>
    <th  rowspan="2">S.No</th>
    <th  rowspan="2">Date</th>
    <th rowspan="2">Period</th>
    <th  rowspan="2">Time</th>
    <th  rowspan="2">Year</th>    
    <th  rowspan="2">Branch</th>
    <th  rowspan="2">Section</th>
    <th rowspan="2">Faculty willing to take up class</th> 
  </tr>
 </thead>
 <tbody>
<tr>
<td rowspan="5">1</td>
<td rowspan="5"><?php echo $row['cdate1']; ?></td>
<td><?php echo $row['period11']; ?></td>
<td><?php echo $row['time11']; ?></td>
<td><?php echo $row['year11']; ?></td>
<td><?php echo $row['branch11']; ?></td>
<td><?php echo $row['section11']; ?></td>
<td><?php echo $row['faculty11']; ?></td>
</tr>
<tr>
 <td><?php echo $row['period12']; ?></td>
<td><?php echo $row['time12']; ?></td>
<td><?php echo $row['year12']; ?></td>
<td><?php echo $row['branch12']; ?></td>
<td><?php echo $row['section12']; ?></td>
<td><?php echo $row['faculty12']; ?></td> 
</tr>
<tr>
  <td><?php echo $row['period13']; ?></td>
<td><?php echo $row['time13']; ?></td>
<td><?php echo $row['year13']; ?></td>
<td><?php echo $row['branch13']; ?></td>
<td><?php echo $row['section13']; ?></td>
<td><?php echo $row['faculty13']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period14']; ?></td>
<td><?php echo $row['time14']; ?></td>
<td><?php echo $row['year14']; ?></td>
<td><?php echo $row['branch14']; ?></td>
<td><?php echo $row['section14']; ?></td>
<td><?php echo $row['faculty14']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period15']; ?></td>
<td><?php echo $row['time15']; ?></td>
<td><?php echo $row['year15']; ?></td>
<td><?php echo $row['branch15']; ?></td>
<td><?php echo $row['section15']; ?></td>
<td><?php echo $row['faculty15']; ?></td>
  </tr>
 <tr>
<td rowspan="5">2</td>
<td rowspan="5"><?php echo $row['cdate2']; ?></td>
<td><?php echo $row['period21']; ?></td>
<td><?php echo $row['time21']; ?></td>
<td><?php echo $row['year21']; ?></td>
<td><?php echo $row['branch21']; ?></td>
<td><?php echo $row['section21']; ?></td>
<td><?php echo $row['faculty21']; ?></td>
</tr>
<tr>
 <td><?php echo $row['period22']; ?></td>
<td><?php echo $row['time22']; ?></td>
<td><?php echo $row['year22']; ?></td>
<td><?php echo $row['branch22']; ?></td>
<td><?php echo $row['section22']; ?></td>
<td><?php echo $row['faculty22']; ?></td> 
</tr>
<tr>
  <td><?php echo $row['period23']; ?></td>
<td><?php echo $row['time23']; ?></td>
<td><?php echo $row['year23']; ?></td>
<td><?php echo $row['branch23']; ?></td>
<td><?php echo $row['section23']; ?></td>
<td><?php echo $row['faculty23']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period24']; ?></td>
<td><?php echo $row['time24']; ?></td>
<td><?php echo $row['year24']; ?></td>
<td><?php echo $row['branch24']; ?></td>
<td><?php echo $row['section24']; ?></td>
<td><?php echo $row['faculty24']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period25']; ?></td>
<td><?php echo $row['time25']; ?></td>
<td><?php echo $row['year25']; ?></td>
<td><?php echo $row['branch25']; ?></td>
<td><?php echo $row['section25']; ?></td>
<td><?php echo $row['faculty25']; ?></td>
  </tr><tr>
<td rowspan="5">3</td>
<td rowspan="5"><?php echo $row['cdate3']; ?></td>
<td><?php echo $row['period31']; ?></td>
<td><?php echo $row['time31']; ?></td>
<td><?php echo $row['year31']; ?></td>
<td><?php echo $row['branch31']; ?></td>
<td><?php echo $row['section31']; ?></td>
<td><?php echo $row['faculty31']; ?></td>
</tr>
<tr>
 <td><?php echo $row['period32']; ?></td>
<td><?php echo $row['time32']; ?></td>
<td><?php echo $row['year32']; ?></td>
<td><?php echo $row['branch32']; ?></td>
<td><?php echo $row['section32']; ?></td>
<td><?php echo $row['faculty32']; ?></td> 
</tr>
<tr>
  <td><?php echo $row['period33']; ?></td>
<td><?php echo $row['time33']; ?></td>
<td><?php echo $row['year33']; ?></td>
<td><?php echo $row['branch33']; ?></td>
<td><?php echo $row['section33']; ?></td>
<td><?php echo $row['faculty33']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period34']; ?></td>
<td><?php echo $row['time34']; ?></td>
<td><?php echo $row['year34']; ?></td>
<td><?php echo $row['branch34']; ?></td>
<td><?php echo $row['section34']; ?></td>
<td><?php echo $row['faculty34']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period35']; ?></td>
<td><?php echo $row['time35']; ?></td>
<td><?php echo $row['year35']; ?></td>
<td><?php echo $row['branch35']; ?></td>
<td><?php echo $row['section35']; ?></td>
<td><?php echo $row['faculty35']; ?></td>
  </tr><tr>
<td rowspan="5">4</td>
<td rowspan="5"><?php echo $row['cdate4']; ?></td>
<td><?php echo $row['period41']; ?></td>
<td><?php echo $row['time41']; ?></td>
<td><?php echo $row['year41']; ?></td>
<td><?php echo $row['branch41']; ?></td>
<td><?php echo $row['section41']; ?></td>
<td><?php echo $row['faculty41']; ?></td>
</tr>
<tr>
 <td><?php echo $row['period42']; ?></td>
<td><?php echo $row['time42']; ?></td>
<td><?php echo $row['year42']; ?></td>
<td><?php echo $row['branch42']; ?></td>
<td><?php echo $row['section42']; ?></td>
<td><?php echo $row['faculty42']; ?></td> 
</tr>
<tr>
  <td><?php echo $row['period43']; ?></td>
<td><?php echo $row['time43']; ?></td>
<td><?php echo $row['year43']; ?></td>
<td><?php echo $row['branch43']; ?></td>
<td><?php echo $row['section43']; ?></td>
<td><?php echo $row['faculty43']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period44']; ?></td>
<td><?php echo $row['time44']; ?></td>
<td><?php echo $row['year44']; ?></td>
<td><?php echo $row['branch44']; ?></td>
<td><?php echo $row['section44']; ?></td>
<td><?php echo $row['faculty44']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period45']; ?></td>
<td><?php echo $row['time45']; ?></td>
<td><?php echo $row['year45']; ?></td>
<td><?php echo $row['branch45']; ?></td>
<td><?php echo $row['section45']; ?></td>
<td><?php echo $row['faculty45']; ?></td>
  </tr><tr>
<td rowspan="5">5</td>
<td rowspan="5"><?php echo $row['cdate5']; ?></td>
<td><?php echo $row['period51']; ?></td>
<td><?php echo $row['time51']; ?></td>
<td><?php echo $row['year51']; ?></td>
<td><?php echo $row['branch51']; ?></td>
<td><?php echo $row['section51']; ?></td>
<td><?php echo $row['faculty51']; ?></td>
</tr>
<tr>
 <td><?php echo $row['period52']; ?></td>
<td><?php echo $row['time52']; ?></td>
<td><?php echo $row['year52']; ?></td>
<td><?php echo $row['branch52']; ?></td>
<td><?php echo $row['section52']; ?></td>
<td><?php echo $row['faculty52']; ?></td> 
</tr>
<tr>
  <td><?php echo $row['period53']; ?></td>
<td><?php echo $row['time53']; ?></td>
<td><?php echo $row['year53']; ?></td>
<td><?php echo $row['branch53']; ?></td>
<td><?php echo $row['section53']; ?></td>
<td><?php echo $row['faculty53']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period54']; ?></td>
<td><?php echo $row['time54']; ?></td>
<td><?php echo $row['year54']; ?></td>
<td><?php echo $row['branch54']; ?></td>
<td><?php echo $row['section54']; ?></td>
<td><?php echo $row['faculty54']; ?></td>
  </tr>
  <tr>
  <td><?php echo $row['period55']; ?></td>
<td><?php echo $row['time55']; ?></td>
<td><?php echo $row['year55']; ?></td>
<td><?php echo $row['branch55']; ?></td>
<td><?php echo $row['section55']; ?></td>
<td><?php echo $row['faculty55']; ?></td>
  </tr>
</tbody>
</table>
     </div>
</div></td>
      <td><?php echo $row['ondate']; ?></td>
      <td><?php echo $row['time']; ?></td>
      <td style="color: green;"><?php echo $row['status']; ?></td>
      <td><form method="post"><input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="hidden" name="applydate" value="<?php echo $row['applydate'];?>">
                            <input type="hidden" name="name" value="<?php echo $row['name'];?>">
                            <input type="hidden" name="days" value="<?php echo $row['days'];?>">
                            <input type="hidden" name="leavetype" value="<?php echo $row['leavetype'];?>">
                            <input type="hidden" name="purpose" value="<?php echo $row['purpose'];?>">
        <button type="submit" name="approve" id="button" onClick="return confirm('Do you want to continue?')">Approve</button><button type="submit" name="reject" id="button" onClick="return confirm('Do you want to continue?')">X&nbspReject</button></form></td>
    </tr>
    <?php $i++;}}else{echo "No Record Found!";} ?>
 </tbody>
</table>
</body>
</html>

