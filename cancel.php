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
      $leaveDays=$leaveDays-1;
   }
}

  header("Location: viewcancelleaves.php");
$name=$_SESSION['username'];
$dept=$_SESSION['department'];
$id=$_SESSION['id'];
$leavetype=$_POST['leavetype'];
$days=$leaveDays;
$from=$_POST['fromdate'];
$to=$_POST['todate'];
$reason=$_POST['reason'];
$ad=date("Y-m-d");


$addquery2="insert into cancelleave (name,department,id,applydate,leavetype,days,fromdate,todate,reason) values('$name','$dept','$id','$ad','$leavetype','$days','$from','$to','$reason')";
$addresult2=mysqli_query($con,$addquery2);

}

?>
<html>
<head>
<title>Cancel Leave</title>
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
<h1><u>LEAVE CANCELLATION FORM</u></h1>
<p>
<b>From:</b><br>
Name:<?php  echo $_SESSION['username']; ?><br>
Department:<?php echo $_SESSION['department']; ?><br>
ID:<?php  echo $_SESSION['id']; ?><br><br>
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
I wish to cancel my <select name="leavetype"><option value="CasualLeave">CasualLeave</option><option value="EarnedLeave">EarnedLeave</option><option value="SickLeave">SickLeave</option><option value="AcademicLeave">AcademicLeave</option><option value="OnDutyLeave">OnDuty</option></select> day(s) from <input type="date" name="fromdate"> to <input type="date" name="todate"> because of the following reason: &nbsp;<input type="text" name="reason" required>.<br>
Thank You.
</p>



<button type="submit" name="submit">Submit</button>
</form>
</body>
</html>
