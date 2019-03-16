<html>
<head>
<title>Welcome</title>
<style>
body{background-image:url("images.jpg");background-size:cover;}
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







</body>
</html>
