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

  header("Location: staffviewleave.php");
$name=$_SESSION['username'];
$dept=$_SESSION['department'];
$id=$_SESSION['id'];
$lt="SickLeave";
$days=$leaveDays;
$from=$_POST['fromdate'];
$to=$_POST['todate'];
$purpose=$_POST['purpose'];
$ad=date("Y-m-d");


$addquery2="insert into staffleave (name,department,id,applydate,leavetype,days,fromdate,todate,purpose) values('$name','$dept','$id','$ad','$lt','$days','$from','$to','$purpose')";
$addresult2=mysqli_query($con,$addquery2);

}

?>

<html>
<head>
<title>Sick Leave</title>
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
<h1><u>SICK LEAVE APPLICATION</u></h1>
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
Kindly grant me SL for  <input type="text" id="days" name="days" placeholder="Enter no.of days..." required>  day(s) from  <input type="date" name="fromdate" required>  to  <input type="date" name="todate" required>  for the purpose of <input type="text" id="purpose" name="purpose" placeholder="Purpose of leave" required>.
</p>


<button type="submit" name="submit">Apply Leave</button></form>
</body>
</html>
