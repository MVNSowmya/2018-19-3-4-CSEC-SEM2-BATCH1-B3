<?php
require('db.php');
session_start();
if(isset($_REQUEST["add"]))
{
$lname=$_POST["leavetype"];
$day=$_POST["days"];
 $query2 = "SELECT * FROM leavetypes where leavetype='$lname' and days='$day'";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==0)
        {
$addquery="insert into leavetypes (name,days) values ('$lname','$day')";
$addresult=mysqli_query($con,$addquery);
echo '<script>alert("Data Added Successfully");</script>';}
else{
  echo '<script>alert("Data Already Present!");</script>';
}
}

if(isset($_REQUEST["update"]))
{
$lname=$_POST["leavetype"];
$day=$_POST["days"];
$query2 = "SELECT * FROM leavetypes where leavetype='$lname' and days='$day'";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==1)
        {
          $mysqlresult2=mysqli_query($con, $query2);          

            while( $row =mysqli_fetch_assoc( $mysqlresult2 ) ){
$updatequery="update leavetypes set days='$day' where name ='$lname'";
$updateresult=mysqli_query($con,$updatequery);
echo '<script>alert("Updation Successful!");</script>';
}}
else{echo '<script>alert("Data Not Found!");</script>';}}

if(isset($_REQUEST["delete"]))
{
$lname=$_POST["leavetype"];
$day=$_POST["days"];
$query2 = "SELECT * FROM leavetypes where leavetype='$lname' and days='$day'";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==1)
        {
          $mysqlresult2=mysqli_query($con, $query2);          

            while( $row =mysqli_fetch_assoc( $mysqlresult2 ) ){
$deletequery="delete from leavetypes where name='$lname' and days='$day'";
$deleteresult=mysqli_query($con,$deletequery);
echo '<script>alert("Deletion Successful!");</script>';
}}
else{echo '<script>alert("Data Not Found!");</script>';}}



?>
<html>

<head>

<title>Leave Types</title>

<style>

label {
      color: blue;
      font-family: Arial; 
}

input[type=text]{
    
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
right:200;
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

<h1>Leave Types</h1>

<p>Add , Update , Delete a Leave Type</p>
<br><br>

<form method="post">
<label for="leavetype">LeaveType</label>
  
&nbsp;
&nbsp;
&nbsp; 
 <input type="text" name="leavetype" placeholder="Leave TypeName..." required><br>

<label for="days">Days:</label>

&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;

&nbsp;    
<input type="text" name="days" placeholder="Number of Days..." required><br>


<div class="btn-group">
  
<button class="button" name="add">Add</button>
  
<button class="button" name="update">Update</button>
  
<button class="button" name="delete">Delete</button>
  
</div>

</form>
<div class="view">
<br><br><br>
     
<p>View Here for Leave Types</p>
  
<?php
require('db.php');

 $sql="SELECT * FROM leavetypes";
$mysqlresult=mysqli_query($con, $sql);

$count=mysqli_num_rows($mysqlresult);

    ?>
    
<table border="5">
  <thead>
    <tr>
      <th>Leavetype Name</th>
      <th>No. of days</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
      if( $count==0 ){
        echo '<tr><td colspan="4">No data to display</td></tr>';
      }
      else
      {
        while( $row =mysqli_fetch_assoc( $mysqlresult ) ){
          
          echo "<tr><td>{$row['name']}</td><td>{$row['days']}</td></tr>\n";

        
        }
      }
    ?>
  </tbody>
</table>
    
</div>







</body>

</html>