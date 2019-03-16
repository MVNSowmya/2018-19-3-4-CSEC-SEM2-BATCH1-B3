<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_REQUEST['login'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['uname']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['psw']);
	$password = mysqli_real_escape_string($con,$password);
  $password = md5($password);
        $id = stripslashes($_REQUEST['id']);
	$id = mysqli_real_escape_string($con,$id);
        $logintype = stripslashes($_REQUEST['logintype']);
	$logintype = mysqli_real_escape_string($con,$logintype);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM userinfo WHERE jobtype='$logintype' and id='$id' and username='$username' and password='$password'";
	$result = mysqli_query($con,$query) or die(mysqli_error());
  
	$rows = mysqli_num_rows($result);

        if($rows==1)
        {
        	$mysqlresult1=mysqli_query($con, $query);

            

            while( $row =mysqli_fetch_assoc( $mysqlresult1 ) ){


        	    $_SESSION['username'] = $username;
        	    $_SESSION['id'] = $id; 	
        	     $_SESSION['jobtype'] = $logintype;
        	    $_SESSION['department'] = $row['department'];
        	   
        	    
        	    $_SESSION['contact'] = $row['contact'];
	       }


	       if($logintype=='Faculty'){
         
	    header("Location:facultyapplicant.php");
         }
         elseif ($logintype=='Staff'){ header("Location:staffapplicant.php");}
         elseif ($logintype=='HoD'){ header("Location:hod1.php");}
         else{ header("Location:admin1.php");}
       }
        else {
	                    echo '<script>alert("Login Credentials are incorrect!");</script>';
	}
 }
 if(isset($_REQUEST["register"]))
{

$username=$_POST["uname"];
$userid=$_POST["id"];
$password=$_POST["psw"];
$psw=md5($password);
 $query2 = "SELECT * FROM userinfo WHERE id='$userid'";
  $result2 = mysqli_query($con,$query2) or die(mysqli_error());
  
  $row = mysqli_num_rows($result2);

        if($row==1)
        {
          $mysqlresult2=mysqli_query($con, $query2);          

            while( $row =mysqli_fetch_assoc( $mysqlresult2 ) ){
$query="update userinfo set username='$username',password='$psw' where id='$userid'";
$result=mysqli_query($con,$query);
echo '<script>alert("Registration Successful!");</script>';
//$to = $row['contact'].'@vtext.com';
//$message="You are registered in the ANITS Online Leave Management System.\nIf it is not you, please contact to your admin.";
//$headers="From: ANITS OLMS";
//mail($to,'',$message,$headers);
}
}else{
  echo '<script>alert("Sorry ! Your details not found. Please contact your admin.");</script>';
}}
   
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;background-color:pink;background-size: 90%;}
.loginbox1{
          width:320px;
          height:500px;
          background:#F5A4F7;
          color:black;
          top:45%;
          left:55%;
          position:absolute;
          transform:translate(-185%,-45%);
          box-sizing:border-box;
          padding:70px 30px;
          background-image: url("login.jpg");
         

}.loginbox1 input{width:100%;margin-bottom:20px;}
.loginbox1 input[type=text], input[type=password] ,select{
  border:none;
  border-bottom:1px solid #fff;
background:transparent;
outline:none;
height:40px;
color:purple;
font-size:16px;
}
.loginbox1 select{
  
background:transparent;
outline:none;
height:40px;
color:brown;
font-size:16px;
}
.loginbox1 h1{
   margin:0;
   padding:0 0 20px;
   text-align:center;
   font-size:22px;
text-shadow:none;
}
.loginbox1 button{
                border:none;
                width:100%;
                outline:none;
                height:40px;
                background:red;
                color:#fff;
                font-size:16px;
                border-radius:20px;
                margin-left: 0px;
}
.loginbox1 button:hover{
cursor:pointer;
background:#ffc107;
color:#000;
}


.loginbox2{
          width:320px;
          height:500px;
          background:#F5A4F7;
          color:black;
          top:45%;
          left:55%;
          position:absolute;
          transform:translate(-50%,-45%);
          box-sizing:border-box;
          padding:70px 30px; 
          background-image: url("register.jpg");  
  }.loginbox2 input{width:100%;margin-bottom:20px;}
.loginbox2 input[type=text], input[type=password] ,select{
  border:none;
  border-bottom:1px solid #fff;
background:transparent;
outline:none;
height:40px;
color:purple;
font-size:16px;
}
.loginbox2 select{
  
background:transparent;
outline:none;
height:40px;
color:brown;
font-size:16px;
}
.loginbox2 h1{
   margin:0;
   padding:0 0 20px;
   text-align:center;
   font-size:22px;
text-shadow:none;
}
.loginbox2 button{
                border:none;
                width:100%;
                outline:none;
                height:40px;
                background:red;
                color:#fff;
                font-size:16px;
                border-radius:20px;
                margin-left: 0px;
}
.loginbox2 button:hover{
cursor:pointer;
background:#ffc107;
color:#000;
}
/* Set a style for all buttons */
button {
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-left: 400px;
  border-radius: 20px;

}

button:hover {
  opacity: 0.8;
}
.avatar{
        
width:100px;
        
height:100px;
        
border-radius:50%;
        
position:absolute;
        
top:-10%;
        
left:35%;

}

a{color:blue;}




span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal1 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-image: url("log.jpg");
  background-repeat: no-repeat;
  background-size: 1375px 675px;
  background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
  padding-top: 60px;
}
.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
  padding-top: 60px;
}
/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 20% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: white;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: -450px;

}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
img{display:block;margin-left: auto;
  margin-right: auto;
  width: 100%;}
 

  .mySlides {display:none;
  	height:450px;}
</style>
</head>
<body>
<img src="anits.jpg" height="125">


<div class="w3" style="width:100%;">
  <img class="mySlides" src="7.png" style="width:100%">
  <img class="mySlides" src="1.jpg" style="width:100%">
  <img class="mySlides" src="2.jpg" style="width:100%">
  <img class="mySlides" src="3.jpg" style="width:100%">
  <img class="mySlides" src="4.jpg" style="width:100%">
  <img class="mySlides" src="5.jpg" style="width:100%">
  <img class="mySlides" src="6.jpg" style="width:100%">
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal1" >
  
  <form class="modal-content animate" method="post">
    
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
     
    

    <div class="loginbox1">
    	 <img src="avatar.jpg" class="avatar">
      <label for="uname"><b>Username</b></label>
 
   <input type="text" placeholder="Enter Username" name="uname" required>

  
  <label for="psw"><b>Password</b></label>
  
  <input type="password" placeholder="Enter Password" name="psw" required>

 
  <label for="uname"><b>Id</b></label>  
<input type="text" placeholder="Enter Id" name="id" required> 
<label for="logintype"><b>LoginType</b></label>
 
   <select id="logintype" name="logintype">
    
  <option value="Faculty">Faculty</option>
 
  <option value="Staff">Staff</option>
    
  <option value="HoD">HoD</option>
     
 <option value="Admin">Admin</option>
  </select>
<br><br>
 
   <button type="submit" name="login">Login</button><br>
  
      New User? Register Now
    </div>

    
  </form>
</div>

        

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Register</button>

<div id="id02" class="modal2">
  
  <form class="modal-content animate" method="post">
    
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    

    <div class="loginbox2">
     <img src="avatar.jpg" class="avatar"><br><br><br>
     <label for="uname"><b>Username</b></label>
    
<input type="text" placeholder="Enter Username" name="uname" required>

    
<label for="psw"><b>Password</b></label>
    
<input type="password" id="psw" placeholder="Enter password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
<label for="id"><b>Id</b></label>
    
<input type="text" placeholder="Enter Id" name="id" required>   
   
<button type="submit" name="register">Register</button>

    </div>

    
  </form>
</div>
<div id="message" >
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</body>
</html>
