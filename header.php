<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
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
      </style>
        </head>
    <body >
    	 <center>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b><font size="6.5" color="">GIS Based Landmark Info System-Locate a Landmark based on POI</font></b>  &nbsp&nbsp&nbsp<img src="geo.png" height="40px" width="50px"></center><br>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Location a Landmark</label>
      <ul>
        <li><a class="action" href="index.php">Home</a></li>
        <li><a class="action" href="geotagging.html">geotagging</a></li>
        <li><a class="action" href="state_master.php">STATE</a></li>
        <li><a href="district_master.php">DISTRICT</a></li>
        <li><a href="taluk_master.php">TALUK</a></li>
        <li><a href="village_master.php">VILLAGE</a></li>
        <li><a href="index.php">LOGOUT</a></li>
      </ul>
    </nav>
   
</body>
</html>