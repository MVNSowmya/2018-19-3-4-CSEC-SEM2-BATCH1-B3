<html>
<head>
<title>Welcome</title>
<style>
body{background-image:url("images.jpg");background-size:cover;}	
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



</style>
</head>
<body>

<ul id="navmenu">
     <li><a href="staffprofile.php">View Profile</a>
      
     </li>
     <li><a href="staffplanmyleave.php">PlanMyLeave</a>
      
     </li>

<li><a href="staffleavereport.php">Leave Report</a>
      
     </li>

    <li><a href="staffviewleave.php">View Leaves</a>
          
     </li>
     <li><a href="staffviewcancelleaves.php">View Cancel Leaves</a>
          
     </li>

    <li><a href="#">Apply Leave</a>
        <ul class="sub1">
             <li><a href="Casualstaff.php" target="_blank">Casual Leave</a>
                 
             </li>
             <li><a href="Earnedstaff.php" target="_blank">Earned Leave</a>
                 
             </li>
             <li><a href="Sickleave.php" target="_blank">Sick Leave</a>
                 
             </li>
             <li><a href="Academicleave.php" target="_blank">Academic Leave</a>
                 
             </li>
             
             <li><a href="onehourstaff.php" target="_blank">One Hour Permission</a>
                 
             </li>
         </ul> 
     </li>

    <li><a href="logout.php">Log Out</a></li>
    
</ul>







</body>
</html>
