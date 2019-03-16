<?php
require('db.php');
session_start();
$name=$_SESSION['username'];
$id=$_SESSION['id'];
$query="select * from userinfo where name='$name' and id='$id'";
$result=mysqli_query($con,$query);
 while( $row =mysqli_fetch_assoc( $result ) ){
 	$cl=$row['CasualLeave'];
 	$el=$row['EarnedLeave'];
 	$sl=$row['SickLeave'];
 	$al=$row['AcademicLeave'];
 	$odl=$row['OnDutyLeave'];
 	$ohp=$row['OneHourPermission'];
 	$extra=$row['extraleave'];
 }
?>
<html>
<head>
<title>Your Leave Report</title>
<style>

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


p{
color:blue;}
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
     <li><a href="facultyprofile.php">View Profile</a>
      
     </li>
     <li><a href="planmyleave.php">PlanMyLeave</a>
      
     </li>

<li><a href="leavereport.php">Leave Report</a>
      
     </li>

    <li><a href="viewleave.php">View Leaves</a>
          
     </li>
      <li><a href="viewcancelleaves.php">View Cancel Leaves</a>
          
     </li>

    <li><a href="#">Apply Leave</a>
        <ul class="sub1">
             <li><a href="casualleave.php" target="_blank">Casual Leave</a>
                 
             </li>
             <li><a href="EarnedLeave.php" target="_blank">Earned Leave</a>
                 
             </li>
             <li><a href="sickleavefaculty.php" target="_blank">Sick Leave</a>
                 
             </li>
             <li><a href="academicleavefaculty.php" target="_blank" >Academic Leave</a>
                 
             </li>
             <li><a href="onduty.php" target="_blank">On Duty</a>
                 
             </li>
             <li><a href="onehourfaculty.php" target="_blank">One Hour Permission</a>
                 
             </li>
         </ul> 
     </li>

    <li><a href="logout.php">Log Out</a></li>
    
</ul>
<br><br><br>

<h1>Your Leave Report</h1>
<button class="button button1" onClick="p()">Applied Leave:</button>
<button class="button button1" onClick="f();">Balance Leave:</button>
<p>Extra Leave: &nbsp;&nbsp;&nbsp;<?php echo $extra; ?></p>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">function f(){
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Leave Type', 'Balance'],
          ['CasualLeave',     <?php echo $cl ?>],
          ['EarnedLeave',     <?php echo $el ?>],
          ['SickLeave',  <?php echo $sl ?>],
          ['Academic Leave', <?php echo $al ?>],
           ['OnDuty Leave', <?php echo $odl ?>],
          ['One Hour Permission', <?php echo $ohp ?>]
        ]);

        var options = {
          title: 'My Balance Leave',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }}
    </script>

    <script type="text/javascript">function p(){
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Leave Type', 'Applied'],
          ['CasualLeave',     <?php echo 8 - $cl ?>],
          ['EarnedLeave',     <?php echo 12 - $el ?>],
          ['SickLeave',  <?php echo 15 - $sl ?>],
          ['Academic Leave', <?php echo 5 - $al ?>],
           ['OnDuty Leave', <?php echo 10 - $odl ?>],
          ['One Hour Permission', <?php echo $ohp ?>]
        ]);

        var options = {
          title: 'My Applied Leave',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }}
    </script>
  
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>


