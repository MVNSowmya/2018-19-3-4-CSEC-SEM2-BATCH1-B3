<?php
require('db.php');
session_start();
if(isset($_REQUEST["add1"]))
{
$jt=$_POST["jobtype"];
$uname=$_POST["name"];
$uid=$_POST["id"];
$g=$_POST["optradio"];
$doj=$_POST["doj"];
$department=$_POST["dept"];
$contact=$_POST["contact"];
if($jt=="Faculty"){
   $query2 = "SELECT * FROM userinfo where id='$uid'";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==0)
        {
$addquery1="insert into userinfo (jobtype,name,id,gender,doj,department,contact,CasualLeave,EarnedLeave,SickLeave,AcademicLeave,OnDutyLeave,OneHourPermission) values ('$jt','$uname','$uid','$g','$doj','$department','$contact',8,12,15,5,10,0)";
$addresult1=mysqli_query($con,$addquery1);
echo '<script>alert("Data Added Successfully");</script>';
}
else{echo '<script>alert("Data Already Present!");</script>';}}
elseif($jt=="Staff"){
	$query2 = "SELECT * FROM userinfo where id='$uid'";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==0)
        {
		$addquery1="insert into userinfo (jobtype,name,id,gender,doj,department,contact,CasualLeave,EarnedLeave,SickLeave,NonVacationLeave,OneHourPermission) values ('$jt','$uname','$uid','$g','$doj','$department','$contact',10,7,15,7,0)";
        $addresult1=mysqli_query($con,$addquery1);
	    echo '<script>alert("Data Added Successfully");</script>';
}else{echo '<script>alert("Data Already Present!");</script>';}}

else{
	$query2 = "SELECT * FROM userinfo where id='$uid'";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==0)
        {
	$addquery1="insert into userinfo (jobtype,name,id,gender,doj,department,contact) values ('$jt','$uname','$uid','$g','$doj','$department','$contact')";
        $addresult1=mysqli_query($con,$addquery1);echo '<script>alert("Data Added Successfully");</script>';
}else{echo '<script>alert("Data Already Present!");</script>';}}
}

if(isset($_REQUEST["update1"]))
{
$jt=$_POST["jobtype"];
$uname=$_POST["name"];
$uid=$_POST["id"];
$g=$_POST["optradio"];
$doj=$_POST["doj"];
$department=$_POST["dept"];
$contact=$_POST["contact"];
$query2 = "SELECT * FROM userinfo where id='$uid'";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==1)
        {
          $mysqlresult2=mysqli_query($con, $query2);          

            while( $row =mysqli_fetch_assoc( $mysqlresult2 ) ){
$updatequery1="update userinfo set jobtype='$jt',contact='$contact',department='$department',name='$uname',gender='$g',doj='$doj' where id='$uid'";
$updateresult1=mysqli_query($con,$updatequery1);
echo '<script>alert("Updation Successful!");</script>';
}}
else{
	echo '<script>alert("Data Not Found!");</script>';
}}

$d=date("Y-m-d");
$q="select * from userinfo";
$qr=mysqli_query($con,$q);
while($row=mysqli_fetch_assoc($qr)){
if($d=='*-06-01'){
	$el=12+$row['EarnedLeave'];
	$al=12+$row['AcademicLeave'];
	$q1 = "update userinfo set CasualLeave=8 , EarnedLeave='el', SickLeave=15 , AcademicLeave='$al' , OnDutyLeave=10 , OneHourPermission=0,extraleave=0 where jobtype='Faculty'";
	$qr1 = mysqli_query($con,$qr1);
	$els=7+$row['EarnedLeave'];
	$nvl=7+$row['NonVacationLeave'];
	$q2 = "update userinfo set CasualLeave=10 , EarnedLeave='$els', SickLeave=15 , NonVacationLeave='$nvl' , OneHourPermission=0,extraleave=0 where jobtype='Staff'";
	$qr2 = mysqli_query($con,$qr1);
}
}


?>











<html>

<head>

<title>Add and Update</title>

<style>

label {
      color: blue;
      font-family: Arial; 
}

input[type=text],select{
    width: 30%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    
}



.btn-group .button {
  background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  float: left;
}


.btn-group .button:hover {
  background-color: red;}

ul#navmenu {
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


 
 
ul#navmenu li:hover > a {
         background-color: #CFC;
 }
 
ul#navmenu li:hover a:hover {
         background-color: #FF0;
   }
 


.view{
position:absolute;
top:0;
right:50;
}

p{
color:brown;
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
</style>

</head>

<body>


<ul id="navmenu">
     <li><a href="addupdateinfo.php">Add/Update Info</a>
          
     </li>

    

    <li><a href="deleteinfo.php">Delete Info</a>
          
     </li>

   <li><a href="leavetype.php">Leave Type</a>
          
     </li>
   <li><a href="holidays.php">Holidays</a>
          
     </li>
    <li><a href="logout.php">Log Out</a></li>
    
</ul>

<br><br><br>


<p>Add and Update Information</p>
<br><br>

<form method="post">
<label for="jobtype">Job Type</label>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<select name="jobtype">
  <option value="Faculty">Faculty</option>
  <option value="Staff">Staff</option>
  <option value="Hod">HoD</option>
</select>
<br>

<label for="name">Name</label>
 
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;   <input type="text" name="name" placeholder="Enter user name..." required>
<br>

<label for="id">ID</label>
 
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;   <input type="text" name="id" placeholder="Enter user id..." required>
<br>

<label for="gender">Gender</label>
  
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp; 
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp; 
<label class="radio-inline">
      
<input type="radio" name="optradio" value="Male">Male </label>
    
<label class="radio-inline">
      
<input type="radio" name="optradio" value="Female">Female</label>
<br><br>

<label for="doj">Date of Join</label>

&nbsp;
&nbsp;
&nbsp;
&nbsp; 
&nbsp;
&nbsp;
&nbsp; 
<input type="date" name="doj"> 
<br>

<label for="contact">Contact Number</label>
   
&nbsp;
&nbsp;
&nbsp; 
<input type="text" name="contact" placeholder="Enter user contact number..." required>
<br>

<label for="dept">Department</label>


&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<select name="dept">
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
 <option value="EEE">EEE</option>
<option value="CHEM">CHEM</option>
<option value="MECH">MECH</option>
<option value="IT">IT</option>
<option value="MATHEMATICS">MATHEMATICS</option>
<option value="PHYSICS">PHYSICS</option>
<option value="CHEMISTRY">CHEMISTRY</option>
<option value="HUMANITIES">HUMANITIES</option>
</select>

<br>


<div class="btn-group">
  
<button class="button" name="add1">Add</button>
  <button class="button" name="update1">Update</button>
  </form>
  

</div>


<div class="view">

<br><br><br>
     
<p>View Here for Information</p>

<br>
     



<?php
require('db.php');

 $sql1="SELECT * FROM userinfo";
$mysqlresult1=mysqli_query($con, $sql1);

$count1=mysqli_num_rows($mysqlresult1);

    ?>
    
<table border="5">
  <thead>
    <tr>
      <th>JobType</th>
      <th>Name</th>
      <th>Id</th>
      <th>Gender</th>
      <th>Doj</th>
      <th>Department</th>
      <th>Contact</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if( $count1==0 ){
        echo '<tr><td colspan="7">No data to display</td></tr>';
      }
      else
      {
        while( $row =mysqli_fetch_assoc( $mysqlresult1 ) ){
          
          echo "<tr><td>{$row['jobtype']}</td><td>{$row['name']}</td><td>{$row['id']}</td><td>{$row['gender']}</td><td>{$row['doj']}</td><td>{$row['department']}</td><td>{$row['contact']}</td></tr>\n";

        
        }
      }
    ?>
  </tbody>
</table>
    

</div>







</body>

</html>
