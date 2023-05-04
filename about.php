<!DOCTYPE html>
<html>
<head>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<style>
body {
 font-family: montserrat;
  margin: 0;
  background-color: #f2f2f2;
}
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}
p{
  font-size: 20;
}
.column {

  width: 85%;
  height:80%;
  margin-bottom: 16px;
  padding: 0 8x;
}
.column1{
  
  

  margin-bottom: 16px;
  padding: 0 8px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(1, 0.8, 2, 0.9);
  margin: 8px;
  width: 85%;
  height:100%;
}

.about-section {
  padding: 0px;
  text-align: center;
  background-color: #474e5;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: blue;
}
section{
  width:100%;
  height:80%;
}
h2{
  color: white;
}
h3{
  color: black;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
p{
  color: black;

}
font{
  color:black;
}
@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
 <?php include 'header1.php';?>

<body>
   <section>
<div class="about-section">
 <b> <font size="6" style="text-align:center">About</font></b><br>
  <br><br>
</div>
<center>


    <div class="card"><font size="4.5" >
    A GIS-based web application provides a user-friendly interface for managing spatial data and provides various modules to enhance the user's experience. The geotagging module enables users to add and edit landmarks by assigning location data such as latitude and longitude coordinates, description, and images. This functionality helps to organize and manage spatial data effectively.<br>
The geotagging module has several advantages over traditional methods of data collection. Firstly, it's more accurate since it's based on precise coordinates. Additionally, it's more efficient since it eliminates the need for paper-based records and manual data entry. Moreover, since the data is stored digitally, it's easier to manage, share, and update.<br>     The locate a landmark module enables users to search for specific landmarks by name or location and provides directions and distance information. This functionality enhances the user's experience by making it easier to locate and navigate to specific landmarks. Additionally, it enables users to explore their surroundings and discover new landmarks they may not have known existed.<br>    In terms of responsive web design, your web application is designed to provide an optimal viewing experience across a range of devices, from desktop computers to mobile devices. This approach ensures that users can access and use the application regardless of the device we're using.<br>   This web application is a progressive web application (PWA), which means it's designed to work offline, offer push notifications, and be installed on a user's device. This approach enhances the user's experience by providing a seamless experience, regardless of their internet connection, and enabling users to access the application from their device's home screen.
</font>

    
</div>
</section><br><br><br><br><br><br><br><br><br>
</body>
<?php include 'footer.php';?>

</html>
