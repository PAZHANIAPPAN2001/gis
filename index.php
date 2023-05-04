<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GIS</title>
    <link rel="icon" href="geotagging_icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <style>
body {font-family: Arial, Helvetica, sans-serif; background-image: 'tag.png'}
* {box-sizing: border-box;}
 body{
        background-color: #f2f2f2;
        }
        nav{
  background: green;
  height: 50px;
  width: 100%;
}
a.active,a:hover{
  background: #00FF00;
  transition: .5s;
}
/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: green;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  position: relative;
  right: 10px;
  width: 150px;
  height: 40px;
}
.open-button1 {
  background-color: blue;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  position: relative;
  
  right: 10px;
  width: 10px;
}
/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 00;
  right: 15px;
  border: 3px solid #f1f1f1;
  }
.form-popup1 {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}
.form-container1 {
  width: 100%;
  height:600px;
  padding: 10px;
  background-color: white;
}

.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: blue;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
form .signup-link{
  text-align: center;
}
form .signup-link a{
  color: #3498db;
  text-decoration: none;
}
form .signup-link a:hover{
  text-decoration: underline;
}

</style>
</head>  
  <body >
    <br>
<center>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b><font size="6.5" color="">GIS Based Landmark Info System-Locate a Landmark based on POI</font></b>  &nbsp&nbsp&nbsp<img src="geo.png" height="40px" width="50px"></center><br>    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">GIS</label>
      <ul>
        <li><a class="action" href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="locate.php">Locate POI</a></li>
        <li><button class="open-button" onclick="openForm2()"><h2>GeoTagging</h2></button></li>
        <!--<li><a href="geotagging.html">GeoTagging</a></li>-->
        <li><button class="open-button" onclick="openForm()"><h2>Login</h2></button></li>
      </ul>
    </nav>
   <br>
    <section> <font size="5" color="black" align="justify" > A geotag is a geographic identifier that can be added to a digital object such as a photo, message or
website. This geographic identifier can be a relatively precise set of position coordinates but also a
character string that refers to an address, zip code or other (vernacular) geographic place indication.
The geotag provides geographic context to data and can also enable people to find information
specific to a certain geographic location. Today, digital content is often geotagged in some way or
another. This geotagged digital content has enabled two significant changes. It has changed how
Geography, as a discipline, conducts research but it has also affected many socio-spatial processes in
a more direct way. In other words, the geotag has changed both the way we can study the world and
has also affected the world itself.</font></div>
      <br>
      <center><img src="tag.png" height="300" width="350"></div><br><br><br>
    <br><br><br>
    </section>
<br>
<?php include 'footer.php';
include('connection.php');?>

<div class="form-popup" id="myForm">
  <form name="frm" action="login.php" class="form-container" method="POST" onsubmit="return validateform()">
    <h1>Login</h1>

    <label><b>Email</b></label>
    <input type="email" placeholder="Email Address" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        <div class="forget-link">

           forgot password?<button type="button" onclick="openForm1()">click here</button></div>

    <button type="submit" class="btn" name="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    <div class="signup-link">
                 <font color="blue">Not a member? </font><a href="register.php">Signup now</a>

               </div>
  </form>
</div>
<div class="form-popup" id="myForm2">
  <form name="frm" action="login3.php" class="form-container" method="POST" onsubmit="return validateform()">
    <h1>Login</h1>

    <label><b>Email</b></label>
    <input type="email" placeholder="Email Address" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        <div class="forget-link">

           forgot password?<button type="button" onclick="openForm1()">click here</button></div>

    <button type="submit" class="btn" name="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    <div class="signup-link">
                 <font color="blue">> Not a member? </font><a href="register.php">Signup now</a>

               </div>
  </form>
</div>

<div class="form-popup1" id="myForm1">

<CENTER><div class="container">
<form name="frm1" action="password1.php" method="POST" class="form-container1" onSubmit = "return checkPassword(this)">
 <center><h1>Please enter the below details</h1></center><br><br>
          <div class="row">
    <div class="col-25">
          <font size="5"><label>NAME</label></font>
        </div>
         <div class="col-75">
         <input type="text" name="username" />
         </div>
    </div>
    <div class="row">
      <div class="col-25">
         <font size="5"><label>EMAIL ID</label></font>
      </div>
      <div class="col-75">
        <input type="email" name="email" />
      </div>
    </div>
    <div class="row">
     <!-- <div class="col-25">
         <font size="5"><label>DOB</label></font>
      </div>
      <div class="col-75">
        <input type="date" name="dob" value="yyyy-mm-dd" />
      </div>-->
    </div>
       
        <input type="submit" value="submit" id="btn1" /><input type="reset" value="CLEAR" id="btn2" />
<button type="button" onclick="closeForm1()" class="cls">close</button>
 </form>
</div>
<style>
li {listt-style: none;}


* {
  box-sizing: border-box;
}

input[type=text],input[type=password], input[type=date], input[type=number],input[type=email] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-weight: 5;
  color:blue ;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  padding-left: 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}
input[type=reset] {
  background-color: red;
  color: white;
  padding: 12px 20px;
  padding-right: 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  
}
.form-container1 .cls{
  background-color: blue;
  color: white;
  padding: 12px 20px;
  padding-right: 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  
}
.form-container1 .btn1 {
  background-color: blue;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}


.container {
  border-radius: 5px;
  background-color: #fff;
  padding: 20px;
  width: 100%;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 1200px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
function validateform(){  
var name=document.myForm.name.value;  
var password=document.myForm.password.value;  
  
if (name==null || name==""){  
  alert("Name can't be blank");  
  return false;  
}else if(password.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }  
}  
  
</script>
<script>
function openForm1() {
    document.getElementById("myForm").style.display = "none";

  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}
</script>
<script>
function openForm2() {
  document.getElementById("myForm2").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm2").style.display = "none";
}
function validateform(){  
var name=document.myForm.name.value;  
var password=document.myForm.password.value;  
  
if (name==null || name==""){  
  alert("Name can't be blank");  
  return false;  
}else if(password.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }  
}  
  
</script>
</body>
</html>