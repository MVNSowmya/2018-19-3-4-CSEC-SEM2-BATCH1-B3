<?php
require('db.php');

session_start();
if(isset($_REQUEST["submit"]))
{
  header("Location: staffviewleave.php");
$name=$_SESSION['username'];
$dept=$_SESSION['department'];
$id=$_SESSION['id'];
$lt="OneHourPermission";
$ad=date("Y-m-d");
$day=$_POST['day'];
$time=$_POST['time'];
$purpose=$_POST['purpose'];
$addquery2="insert into staffleave (name,department,id,applydate,leavetype,ondate,time,purpose) values('$name','$dept','$id','$ad','$lt','$day','$time','$purpose')";
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
select{
    width: 10%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    
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
.tc input[type=text],[type=date],[type=time]{
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
<h1><u>GATE OUT ONE HOUR PERMISSION APPLICATION</u></h1>
<p>
<b>From:</b><br>
Name:<br>
Designation:<br>
Department:<br><br>
<b>To:</b><br>
Principal<br>
ANITS<br>
Sangivalasa<br>
</p>
<h3><u>THROUGH H.O.D.</u></h3><form method="post">
<p>
Sir,<br>
Kindly grant me Permission for one hour on  <input type="date" name="day" required> for <select name="time"><option value="8.40-9.30">8:40-9:30</option><option value="2.30-3.20">2:30-3:20</option></select> for the purpose of  <input type="text" id="purpose" name="purpose" placeholder="Purpose of leave" required>.  
</p>


<button type="submit" name="submit">Apply Leave</button></form>

</body>
</html>
