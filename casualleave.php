<?php
require('db.php');

session_start();

if(isset($_REQUEST["submit"]))
{
//Get the date to the right format YYYY-MM-DD
$sdArry = explode("-",$_REQUEST['fromdate']);
$startDate = strtotime($sdArry[2]."-".$sdArry[1]."-".$sdArry[0]);
$edArry = explode("-",$_REQUEST['todate']);
$endDate = strtotime($edArry[2]."-".$edArry[1]."-".$edArry[0]);;



//Subtracting dates will give you seconds between.
//Convert that to days.
$daysBetween = (($endDate - $startDate)/60/60/24)+1;

//Remove the Sundays
$leaveDays = ceil($daysBetween - ($daysBetween/7));
$days = array("Sun"=>0,"Mon"=>1,"Tue"=>2,"Wed"=>3,"Thu"=>4,"Fri"=>5,"Sat"=>6);
if($days[date("D",$endDate)] < $days[date("D",$startDate)]) {
    //Take of 1 more sunday
    $leaveDays = $leaveDays - 1;
}

//Remove holidays
$h="select * from holidays";
$h1=mysqli_query($con,$h);
while ($row=mysqli_fetch_all($h1,MYSQLI_BOTH)) {
   $s=$row['dates'];
   $s=strtotime($s);
   $f=strtotime($startDate);
   $t=strtotime($endDate);
   if(($f <= $s) && ($t >= $s)){
      $leaveDays--;
   }
}

  header("Location: viewleave.php");
$name=$_SESSION['username'];
$dept=$_SESSION['department'];
$id=$_SESSION['id'];
$lt="CasualLeave";
$days=$leaveDays;
$from=$_POST['fromdate'];
$to=$_POST['todate'];
$purpose=$_POST['purpose'];
$ad=date("Y-m-d");

$cdate1=$_POST['cdate1'];
$period11=$_POST['period11'];
$time11=$_POST['time11'];
$year11=$_POST['year11'];
$branch11=$_POST['branch11'];
$section11=$_POST['section11'];
$faculty11=$_POST['faculty11'];

$period12=$_POST['period12'];
$time12=$_POST['time12'];
$year12=$_POST['year12'];
$branch12=$_POST['branch12'];
$section12=$_POST['section12'];
$faculty12=$_POST['faculty12'];

$period13=$_POST['period13'];
$time13=$_POST['time13'];
$year13=$_POST['year13'];
$branch13=$_POST['branch13'];
$section13=$_POST['section13'];
$faculty13=$_POST['faculty13'];

$period14=$_POST['period14'];
$time14=$_POST['time14'];
$year14=$_POST['year14'];
$branch14=$_POST['branch14'];
$section14=$_POST['section14'];
$faculty14=$_POST['faculty14'];

$period15=$_POST['period15'];
$time15=$_POST['time15'];
$year15=$_POST['year15'];
$branch15=$_POST['branch15'];
$section15=$_POST['section15'];
$faculty15=$_POST['faculty15'];

$cdate2=$_POST['cdate2'];
$period21=$_POST['period21'];
$time21=$_POST['time21'];
$year21=$_POST['year21'];
$branch21=$_POST['branch21'];
$section21=$_POST['section21'];
$faculty21=$_POST['faculty21'];

$period22=$_POST['period22'];
$time22=$_POST['time22'];
$year22=$_POST['year22'];
$branch22=$_POST['branch22'];
$section22=$_POST['section22'];
$faculty22=$_POST['faculty22'];

$period23=$_POST['period23'];
$time23=$_POST['time23'];
$year23=$_POST['year23'];
$branch23=$_POST['branch23'];
$section23=$_POST['section23'];
$faculty23=$_POST['faculty23'];

$period24=$_POST['period24'];
$time24=$_POST['time24'];
$year24=$_POST['year24'];
$branch24=$_POST['branch24'];
$section24=$_POST['section24'];
$faculty24=$_POST['faculty24'];

$period25=$_POST['period25'];
$time25=$_POST['time25'];
$year25=$_POST['year25'];
$branch25=$_POST['branch25'];
$section25=$_POST['section25'];
$faculty25=$_POST['faculty25'];

$cdate3=$_POST['cdate3'];
$period31=$_POST['period31'];
$time31=$_POST['time31'];
$year31=$_POST['year31'];
$branch31=$_POST['branch31'];
$section31=$_POST['section31'];
$faculty31=$_POST['faculty31'];

$period32=$_POST['period32'];
$time32=$_POST['time32'];
$year32=$_POST['year32'];
$branch32=$_POST['branch32'];
$section32=$_POST['section32'];
$faculty32=$_POST['faculty32'];

$period33=$_POST['period33'];
$time33=$_POST['time33'];
$year33=$_POST['year33'];
$branch33=$_POST['branch33'];
$section33=$_POST['section33'];
$faculty33=$_POST['faculty33'];

$period34=$_POST['period34'];
$time34=$_POST['time34'];
$year34=$_POST['year34'];
$branch34=$_POST['branch34'];
$section34=$_POST['section34'];
$faculty34=$_POST['faculty34'];

$period35=$_POST['period35'];
$time35=$_POST['time35'];
$year35=$_POST['year35'];
$branch35=$_POST['branch35'];
$section35=$_POST['section35'];
$faculty35=$_POST['faculty35'];

$cdate4=$_POST['cdate4'];
$period41=$_POST['period41'];
$time41=$_POST['time41'];
$year41=$_POST['year41'];
$branch41=$_POST['branch41'];
$section41=$_POST['section41'];
$faculty41=$_POST['faculty41'];

$period42=$_POST['period42'];
$time42=$_POST['time42'];
$year42=$_POST['year42'];
$branch42=$_POST['branch42'];
$section42=$_POST['section42'];
$faculty42=$_POST['faculty42'];

$period43=$_POST['period43'];
$time43=$_POST['time43'];
$year43=$_POST['year43'];
$branch43=$_POST['branch43'];
$section43=$_POST['section43'];
$faculty43=$_POST['faculty43'];

$period44=$_POST['period44'];
$time44=$_POST['time44'];
$year44=$_POST['year44'];
$branch44=$_POST['branch44'];
$section44=$_POST['section44'];
$faculty44=$_POST['faculty44'];

$period45=$_POST['period45'];
$time45=$_POST['time45'];
$year45=$_POST['year45'];
$branch45=$_POST['branch45'];
$section45=$_POST['section45'];
$faculty45=$_POST['faculty45'];

$cdate5=$_POST['cdate5'];
$period51=$_POST['period51'];
$time51=$_POST['time51'];
$year51=$_POST['year51'];
$branch51=$_POST['branch51'];
$section51=$_POST['section51'];
$faculty51=$_POST['faculty51'];

$period52=$_POST['period52'];
$time52=$_POST['time52'];
$year52=$_POST['year52'];
$branch52=$_POST['branch52'];
$section52=$_POST['section52'];
$faculty52=$_POST['faculty52'];

$period53=$_POST['period53'];
$time53=$_POST['time53'];
$year53=$_POST['year53'];
$branch53=$_POST['branch53'];
$section53=$_POST['section53'];
$faculty53=$_POST['faculty53'];

$period54=$_POST['period54'];
$time54=$_POST['time54'];
$year54=$_POST['year54'];
$branch54=$_POST['branch54'];
$section54=$_POST['section54'];
$faculty54=$_POST['faculty54'];

$period55=$_POST['period55'];
$time55=$_POST['time55'];
$year55=$_POST['year55'];
$branch55=$_POST['branch55'];
$section55=$_POST['section55'];
$faculty55=$_POST['faculty55'];

$status="Pending";


$addquery2="insert into facultyleave (name,department,id,applydate,leavetype,fromdate,todate,days,purpose,status) values('$name','$dept','$id','$ad','$lt','$from','$to','$days','$purpose','$status')";
$result=mysqli_query($con,$addquery2);

$uq11="update facultyleave set cdate1='$cdate1',period11='$period11',time11='$time11',year11='$year11',branch11='$branch11',section11='$section11',faculty11='$faculty11' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr11=mysqli_query($con,$uq11);

$uq12="update facultyleave set cdate1='$cdate1',period12='$period12',time12='$time12',year12='$year12',branch12='$branch12',section12='$section12',faculty12='$faculty12' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr12=mysqli_query($con,$uq12);

$uq13="update facultyleave set cdate1='$cdate1',period13='$period13',time13='$time13',year13='$year13',branch13='$branch13',section13='$section13',faculty13='$faculty13' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr13=mysqli_query($con,$uq13);

$uq14="update facultyleave set cdate1='$cdate1',period14='$period14',time14='$time14',year14='$year14',branch14='$branch14',section14='$section14',faculty14='$faculty14' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr14=mysqli_query($con,$uq14);

$uq15="update facultyleave set cdate1='$cdate1',period15='$period15',time15='$time15',year15='$year15',branch15='$branch15',section15='$section15',faculty15='$faculty15' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr15=mysqli_query($con,$uq15);

$uq21="update facultyleave set cdate2='$cdate2',period21='$period21',time21='$time21',year21='$year21',branch21='$branch21',section21='$section21',faculty21='$faculty21' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr21=mysqli_query($con,$uq21);

$uq22="update facultyleave set cdate2='$cdate2',period22='$period22',time22='$time22',year22='$year22',branch22='$branch22',section22='$section22',faculty22='$faculty22' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr22=mysqli_query($con,$uq22);

$uq23="update facultyleave set cdate2='$cdate2',period23='$period23',time23='$time23',year23='$year23',branch23='$branch23',section23='$section23',faculty23='$faculty23' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr23=mysqli_query($con,$uq23);

$uq24="update facultyleave set cdate2='$cdate2',period24='$period24',time24='$time24',year24='$year24',branch24='$branch24',section24='$section24',faculty24='$faculty24' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr24=mysqli_query($con,$uq24);

$uq25="update facultyleave set cdate2='$cdate2',period25='$period25',time25='$time25',year25='$year25',branch25='$branch25',section25='$section25',faculty25='$faculty25' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr25=mysqli_query($con,$uq25);

$uq31="update facultyleave set cdate3='$cdate3',period31='$period31',time31='$time31',year31='$year31',branch31='$branch31',section31='$section31',faculty31='$faculty31' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr31=mysqli_query($con,$uq31);

$uq32="update facultyleave set cdate3='$cdate3',period32='$period32',time32='$time32',year32='$year32',branch32='$branch32',section32='$section32',faculty32='$faculty32' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr32=mysqli_query($con,$uq32);

$uq33="update facultyleave set cdate3='$cdate3',period33='$period33',time33='$time33',year33='$year33',branch33='$branch33',section33='$section33',faculty33='$faculty3' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr33=mysqli_query($con,$uq33);

$uq34="update facultyleave set cdate3='$cdate3',period34='$period34',time34='$time34',year34='$year34',branch34='$branch34',section34='$section34',faculty34='$faculty34' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr34=mysqli_query($con,$uq34);

$uq35="update facultyleave set cdate3='$cdate3',period35='$period35',time35='$time35',year35='$year35',branch35='$branch35',section35='$section35',faculty35='$faculty35' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr35=mysqli_query($con,$uq35);

$uq41="update facultyleave set cdate4='$cdate4',period41='$period41',time41='$time41',year41='$year41',branch41='$branch41',section41='$section41',faculty41='$faculty41' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr41=mysqli_query($con,$uq41);

$uq42="update facultyleave set cdate4='$cdate4',period42='$period42',time42='$time42',year42='$year42',branch42='$branch42',section42='$section42',faculty42='$faculty42' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr42=mysqli_query($con,$uq42);

$uq43="update facultyleave set cdate4='$cdate4',period43='$period43',time43='$time43',year43='$year43',branch43='$branch43',section43='$section43',faculty43='$faculty43' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr43=mysqli_query($con,$uq43);

$uq44="update facultyleave set cdate4='$cdate4',period44='$period44',time44='$time44',year44='$year44',branch44='$branch44',section44='$section44',faculty44='$faculty44' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr44=mysqli_query($con,$uq44);

$uq45="update facultyleave set cdate4='$cdate4',period45='$period45',time45='$time45',year45='$year45',branch45='$branch45',section45='$section45',faculty45='$faculty45' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr45=mysqli_query($con,$uq45);

$uq51="update facultyleave set cdate5='$cdate5',period51='$period51',time51='$time51',year51='$year51',branch51='$branch51',section51='$section51',faculty51='$faculty51' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr51=mysqli_query($con,$uq51);

$uq52="update facultyleave set cdate5='$cdate5',period52='$period52',time52='$time52',year52='$year52',branch52='$branch52',section52='$section52',faculty52='$faculty52' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr52=mysqli_query($con,$uq52);

$uq53="update facultyleave set cdate5='$cdate5',period53='$period53',time53='$time53',year53='$year53',branch53='$branch53',section53='$section53',faculty53='$faculty53' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr53=mysqli_query($con,$uq53);

$uq54="update facultyleave set cdate5='$cdate5',period54='$period54',time54='$time54',year54='$year54',branch54='$branch54',section54='$section54',faculty54='$faculty54' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr54=mysqli_query($con,$uq54);

$uq55="update facultyleave set cdate5='$cdate5',period55='$period55',time55='$time55',year55='$year55',branch55='$branch55',section55='$section55',faculty55='$faculty55' where name='$name' and department='$dept' and id='$id' and applydate='$ad' and leavetype='$lt' and fromdate='$from' and todate='$to' and days='$days' and purpose='$purpose' and status='$status'";
$uqr55=mysqli_query($con,$uq55);
}
?>
<html>
<head>
<title>Casual Leave</title>
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
button{
width:50%;
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
<h1><u>CASUAL LEAVE APPLICATION</u></h1>
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
<h3><u>THROUGH H.O.D.</u></h3>
<form method="post">
<p>
Sir,<br>
Kindly grant me CL for  <input type="text" id="days" name="days" placeholder="Enter no.of days..." required>  day(s) from  <input type="date" name="fromdate" required>  to  <input type="date" name="todate" required>  for the purpose of <input type="text" id="purpose" name="purpose" placeholder="Purpose of leave" required>.  During my absence,my classwork will be taken up as detailed below:
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
<td rowspan="5">1</td>
<td rowspan="5"><input type="date" id="date" name="cdate1"></td>
<td><select name="period11">
  <option value="---">-----</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time11">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year11">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch11">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section11">
 <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty11" placeholder="Enter faculty name..."></input></td>
</tr>

<tr>
<td><select name="period12">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time12">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year12">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch12">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section12">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty12" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period13">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time13">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year13">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch13">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section13">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty13" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period14">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time14">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year14">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch14">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section14">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty14" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period15">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time15">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year15">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch15">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section15">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty15" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td rowspan="5">2</td>
<td rowspan="5"><input type="date" id="date" name="cdate2"></td>
<td><select name="period21">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time21">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year21">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch21">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section21">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty21" placeholder="Enter faculty name..."></input></td>
</tr>

<tr>
<td><select name="period22">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time22">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year22">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch22">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section22">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty22" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period23">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time23">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year23">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch23">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section23">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty23" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period24">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time24">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year24">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch24">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section24">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty24" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period25">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time25">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year25">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch25">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section25">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty25" placeholder="Enter faculty name..."></input></td>
</tr><tr>
<td rowspan="5">3</td>
<td rowspan="5"><input type="date" id="date" name="cdate3"></td>
<td><select name="period31">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time31">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year31">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch31">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section31">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty31" placeholder="Enter faculty name..."></input></td>
</tr>

<tr>
<td><select name="period32">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time32">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year32">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch32">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section32">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty32" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period33">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time33">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year33">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch33">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section33">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty33" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period34">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time34">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year34">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch34">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section34">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty34" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period35">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time35">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year35">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch35">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section35">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty35" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td rowspan="5">4</td>
<td rowspan="5"><input type="date" id="date" name="cdate4"></td>
<td><select name="period41">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time41">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year41">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch41">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section41">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty41" placeholder="Enter faculty name..."></input></td>
</tr>

<tr>
<td><select name="period42">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time42">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year42">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch42">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section42">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty42" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period43">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time43">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year43">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch43">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section43">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty43" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period44">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time44">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year44">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch44">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section44">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty44" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period45">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time45">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year45">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch45">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section45">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty45" placeholder="Enter faculty name..."></input></td>
</tr>

<tr>
<td rowspan="5">5</td>
<td rowspan="5"><input type="date" id="date" name="cdate5"></td>
<td><select name="period51">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time51">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year51">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch51">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section51">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty51" placeholder="Enter faculty name..."></input></td>
</tr>

<tr>
<td><select name="period52">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time52">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year52">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch52">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section52">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty52" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period53">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time53">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year53">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch53">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section53">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty53" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period54">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time54">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year54">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch54">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section54">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty54" placeholder="Enter faculty name..."></input></td>
</tr>
<tr>
<td><select name="period55">
  <option value="---">---</option>
  <option value="class">Class</option>
  <option value="lab">Lab</option>
</select></td>
<td><select name="time55">
  <option value="---">---</option>
  <option value="8:40 - 9:30">8:40 - 9:30</option>
  <option value="9:30 - 10:20">9:30 - 10:20</option>
  <option value="10:20 - 11:10">10:20 - 11:10</option>
  <option value="11:10 - 12:00">11:10 - 12:00</option>
  <option value="12:00 - 12:50">12:00 - 12:50</option>
  <option value="12:50 - 1:40">12:50 - 1:40</option>
  <option value="1:40 - 2:30">1:40 - 2:30</option>
  <option value="2:30 - 3:20">2:30 - 3:20</option>
  <option value="8:40 - 11:10">8:40 - 11:10</option>
  <option value="9:30 - 12:00">9:30 - 12:00</option>
  <option value="12:00 - 2:30">12:00 - 2:30</option>
 <option value="12:50 - 3:20">12:50 - 3:20</option>
</select></td>
<td><select name="year55">
  <option value="---">---</option>
  <option value="1/4 B.TECH">1/4 B.TECH</option>
  <option value="2/4 B.TECH">2/4 B.TECH</option>
  <option value="3/4 B.TECH">3/4 B.TECH</option>
  <option value="4/4 B.TECH">4/4 B.TECH</option>
  <option value="1/2 M.TECH">1/2 M.TECH</option>
  <option value="2/2 M.TECH">2/2 M.TECH</option>
</select></td>
<td><select name="branch55">
  <option value="---">---</option>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="MECH">MECH</option>
  <option value="IT">IT</option>
  <option value="CHEM">CHEM</option>
</select></td>
<td><select name="section55">
  <option value="---">---</option>
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select></td>
<td><input type="text" id="faculty" name="faculty55" placeholder="Enter faculty name..."></input></td>
</tr>
</table><br><br>

<button type="submit" name="submit">Apply Leave</button>
</form>
</body>
</html>
