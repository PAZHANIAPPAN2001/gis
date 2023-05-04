<!DOCTYPE html>
<head>
<title>Password Change</title>
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


.row:after {
  content: "";
  display: table;
  clear: both;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 80%;
    margin-top: 0;
  }
}
</style>

</head>
<body background="bg.jpg"><br><br>
<center><h1>Please enter the below details</h1></center>
<CENTER><div class="container">
 <form name="frm" action="password1.php" method="POST" onSubmit = "return checkPassword(this)">
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
   <!-- <div class="row">
      <div class="col-25">
         <font size="5"><label>DOB</label></font>
      </div>
      <div class="col-75">
        <input type="date" name="dob" value="yyyy-mm-dd" />
      </div>
    </div>
    <div class="row"> 
      <div class="col-25">
         <font size="5"><label>ENTER NEW PASSWORD</label></font>
      </div>
      <div class="col-75">
        <input type="password" name="password" />
      </div>
    </div>
    <div class="row">
      <div class="col-25">
         <font size="5"><label>CONFIRM PASSWORD</label></font>
      </div>
      <div class="col-75">
        <input type="password" name="password1" />
      </div>
    </div> -->
     <div class="row">
        <input type="submit" value="submit" id="btn" /><div class="btn"><input type="reset" value="CLEAR" id="btn" /></div>
     </div>
 </form>
</div>
</CENTER>
</body>
</html>
