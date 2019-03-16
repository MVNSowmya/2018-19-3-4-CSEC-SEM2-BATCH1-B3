<?php
require('db.php');
session_start();
?>
<html>
<head>
<title>Faculty Leave Report</title>
<style>
body{}
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
border-spacing:5px;
  

}

th {
background-color:pink;
  border: 1px solid brown;
  text-align: left;
  padding: 8px;
}

td {
  border: 1px solid blue;
  text-align: left;
  padding: 8px;
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
.button {
  
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid pink;
}

.button1:hover {
  background-color: brown;
  color: white;
}
</style>
</head>
<body>

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

<h1>Faculty Leave Reports</h1>
<br>
<form method="post">
Enter Faculty ID:
<input type="text" name="id">
<br><br>
<button class="button button1" type="submit" name="submit">Submit</button>
<button class="button button1" type="submit" name="balance">Get Balance</button>
</form>

<?php
    if(isset($_REQUEST['submit'])){?>
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
    
 <?php
 $i=1;
$d=$_POST['id'];
$dept=$_SESSION['department'];
 $sql="SELECT * FROM facultyleave where department='$dept' and id='$d'";
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
  </tr>
</tbody>
</table>
     </div>
</div></td>
      <td><?php echo $row['ondate']; ?></td>
      <td><?php echo $row['time']; ?></td>
      <td style="color: green;"><?php echo $row['status']; ?></td>
    </tr>
    <?php $i++;}}else{echo "No Record Found!";} }?>
 </tbody>
</table>
<?php
if(isset($_REQUEST['balance'])){ 
  $d=$_POST['id'];
  $query="select * from userinfo where id='$d'";
  $qr=mysqli_query($con,$query);
  while ($row=mysqli_fetch_array($qr)) {
  ?>
     CasualLeave: &nbsp;&nbsp;&nbsp;<?php echo $row['CasualLeave']; ?><br>
     EarnedLeave: &nbsp;&nbsp;&nbsp;<?php echo $row['EarnedLeave']; ?><br>
     SickLeave: &nbsp;&nbsp;&nbsp;<?php echo $row['SickLeave']; ?><br>
     AcademicLeave: &nbsp;&nbsp;&nbsp;<?php echo $row['AcademicLeave']; ?><br>
     OneHourPermission: &nbsp;&nbsp;&nbsp;<?php echo $row['OneHourPermission']; ?><br>
     ExtraLeave: &nbsp;&nbsp;&nbsp;<?php echo $row['extraleave']; ?><br>

<?php }} ?>
</body>
</html>