<?php
require('db.php');
session_start();
if(isset($_REQUEST["add"]))
{
$date=$_POST["dates"];

$occasion=$_POST["occasion"];
$query2 = "SELECT * FROM holidays where dates='$date' and occasion='$occasion'";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==0)
        {
$addquery1="insert into holidays (dates,occasion) values ('$date','$occasion')";
$addresult1=mysqli_query($con,$addquery1);
echo '<script>alert("Data Added Successfully");</script>';
}
else{echo '<script>alert("Data Already Present!");</script>';}
}

if(isset($_REQUEST["delete"]))
{
$date=$_POST["dates"];

$occasion=$_POST["occasion"];
$query2 = "SELECT * FROM holidays where dates='$date' and occasion='$occasion";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==1)
        {
          $mysqlresult2=mysqli_query($con, $query2);          

            while( $row =mysqli_fetch_assoc( $mysqlresult2 ) ){
$deletequery1="delete from holidays where dates='$date' and occasion='$occasion'";
$deleteresult1=mysqli_query($con,$deletequery1);
echo '<script>alert("Deletion Successful!");</script>';
}}
else{echo '<script>alert("Data Not Found!");</script>';}}
?>



<html>
<head>
<title>Delete</title>
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

<p>Holiday Information</p>
<br><br>

<form method="post">
<label for="date">Date</label>

&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;&nbsp;
&nbsp;&nbsp;

  <input type="date" name="dates" required> 
<br>



<label for="occasion">Occasion</label>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<input type="text" name="occasion" placeholder="Enter name of the occasion" required>
<br>

<div class="btn-group">
  <button class="button" name="add">Add</button>
  
  <button class="button" name="delete">Delete</button>
  
</div>
</form>
<div class="view">

<br><br><br>
     
<p>View Here for Information</p><br>
 
<?php
require('db.php');

 $sql1="SELECT * FROM holidays";
$mysqlresult1=mysqli_query($con, $sql1);

$count1=mysqli_num_rows($mysqlresult1);

    ?>
    
<table border="5">
  <thead>
    <tr>
      <th>Date</th>
      <th>Occasion</th>
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
          
          echo "<tr><td>{$row['dates']}</td><td>{$row['occasion']}</td></tr>\n";

        
        }
      }
    ?>
  </tbody>
</table>

    
</div>






</body>
</html>
