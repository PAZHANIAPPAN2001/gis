<!DOCTYPE html>
<head>
<title>Registration Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

.container {
  border-radius: 5px;
  background-color: #fff;
  padding: 20px;
  width: 80%;
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

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 80%;
    margin-top: 0;
  }
}
</style>
</head>
<body><br><br>
<center><h1>REGISTRATION FORM</h1></center>
<CENTER><div class="container">
 <form name="frm" action="example.php" method="POST" >
	<div class="row">
		<div class="col-25">
          <font size="5"><label>Username</label></font>
        </div>
         <div class="col-75">
	       <input type="text" name="username" required>
         </div>
    </div>
    <div class="row">
      <div class="col-25">
         <font size="5"><label>EMAIL</label></font>
      </div>
      <div class="col-75">
	      <input type="email" name="email" required>
      </div>
    </div>
   <!-- <div class="row">
       <div class="col-25">
          <font size="5"><label>DOB</label></font>
       </div>
       <div class="col-75">
	      <input type="date" name="dob" />
       </div>
    </div>-->
    <div class="row">
     <div class="col-25">
       <font size="5"><label>PASSWORD</label></font>
     </div>
       <div class="col-75">
	    <font size="5"><input type="password" name="password" required></font>
       </div>
     </div>
     <div class="row">
        <input type="submit" value="REGISTER" id="btn" /><div class="btn"><input type="reset" value="CLEAR" id="btn" /></div>
     </div>
 </form>
</div>
</CENTER>
</body>
</html>
