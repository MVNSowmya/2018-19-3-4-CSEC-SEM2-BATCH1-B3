<?php
require('db.php');

session_start();
if(isset($_REQUEST["submit"]))
{
  header("Location: viewleave.php");
$name=$_SESSION['username'];
$dept=$_SESSION['department'];
$id=$_SESSION['id'];
$lt="OneHourPermission";
$ad=date("Y-m-d");
$day=$_POST['cdate1'];
$time=$_POST['time'];
$purpose=$_POST['purpose'];
$period=$_POST['period'];
$year=$_POST['year'];
$branch=$_POST['branch'];
$section=$_POST['section'];
$faculty=$_POST['faculty11'];
$status="Pending";
$addquery2="insert into facultyleave (name,department,id,applydate,leavetype,ondate,time,purpose,period11,year11,branch11,section11,faculty11,status) values('$name','$dept','$id','$ad','$lt','$day','$time','$purpose','$period','$year','$branch','$section','$faculty','$status')";

$addresult2=mysqli_query($con,$addquery2);
}
?>
<html>

<head>

<title>One Hour Leave</title>

<style>

p{
font-size:20px;
}

h1{
text-align:center;
color:brown;
}

h3{
text-align:center;
}

input{width:12%;margin-bottom:20px;}

input[type=text],[type=date]{
  border:none;
  border-bottom:1px solid brown;
background:transparent;
outline:none;
height:40px;
color:black;
font-size:16px;
}

input#purpose{
width:50%;
}

table {
  font-family: arial, sans-serif;
  
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
  border: 1px solid blue;
  text-align: left;
  padding: 8px;
}


tr:nth-child(even) {
  background-color: #dddddd;
}

.tc input{width:90%;margin-bottom:20px;}

.tc input[type=text],[type=date]{
  border:none;
  border-bottom:1px solid brown;
background:transparent;
outline:none;
height:40px;
color:black;
font-size:16px;
}

img{width:100%;height:15%;}

button{width:50%;
position:absolute;left:25%;
font-size:20px;
background-color:yellow;
border-radius:12px;
}

button:hover{
background-color:green;
}

</style>

 
</head>

<body>
<img src="anits.jpg"></img>
<h1><u>GATE OUT ONE HOUR PERMISSION APPLICATION</u></h1>
<p>
<b>From:</b><br>
Name:<?php  echo $_SESSION['username']; ?><br>
Department:<?php echo $_SESSION['department']; ?><br>
ID:<?php  echo $_SESSION['id']; ?><br>
Apply Date:<?php echo date("Y-m-d");?><br>
<b>To:</b><br>
Principal<br>
ANITS<br>
Sangivalasa<br>
</p>
<h3><u>THROUGH H.O.D.</u></h3><form method="post">
<p>
Sir,<br>
Kindly grant me Permission for one hour for the purpose of  <input type="text" id="purpose" name="purpose" placeholder="Purpose of leave" required>.  During my absence,my classwork will be taken up as detailed below:
</p>

<table class="tc">

<tr>
<th>S.no</th>
<th >Date</th>
<th >Period</th>
<th >Time</th>
<th>Year</th>
<th>Branch</th>
<th >Section</th>

<th >Name of the Faculty member(s) willing to takeup class work</th>
</tr>

<tr>
<td>1</td>
<td><input type="date" id="date" name="cdate1"></td>
<td><select name="period">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
</select></td>
<td><select name="year">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>

<td><input type="text" id="faculty" name="faculty11" placeholder="Enter faculty name..."></input></td>
</tr>
</table><br>

<button type="submit" name="submit">Apply Leave</button></form>
</body>
</html>
