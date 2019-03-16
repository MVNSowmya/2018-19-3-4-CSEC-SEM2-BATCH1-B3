<?php
require('db.php');
session_start();
?>

<html>
<head>
	<title>Plan My Leave</title>
	<style type="text/css">
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
  width: 60%;
border-spacing:5px;
  

}
.view{
position:absolute;
top:60;
right:30;
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

	<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;hl=en&amp;bgcolor=%2300cccc&amp;src=en.indian%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Asia%2FKolkata" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
  <div class="view">
<?php


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