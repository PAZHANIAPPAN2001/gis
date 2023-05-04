<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>State Master</title>
   <?php include 'header.php';?>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
 
  <style type="text/css">
#popup-form {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 120px;
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    #modify-form {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 120px;
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
     #delete-form {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 120px;
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
      </style>
</head>

<body>
    <div>
      <div><br><br><br>
      <center><h1>State Masters</h5>
       <form name="frm" action="other.php" method="POST" >
    <p>
          <LABEL>STATE NAME:</LABEL>     
        <?php
         include('connection.php');
         $query = "SELECT * FROM state_master ";
         $result = pg_query($query) ;
         
         
         ?>

        <select name="select" id="select" onchange='state()'>
          <option value=" " selected disabled>Select</option>
          <?php while ($row = pg_fetch_array($result)){  
          ?>  
         <option value=" <?php $row['state_id']; ?> "><?php echo $row['state_name']; ?></option>
        <?php
          }
        ?>        
        <option value="other"> Others </option>
        </select>
       <br><br><br><br>
        <input type="button" name="Edit" value="Edit" onclick="openform()" class="btn btn-success">&nbsp;&nbsp;
        <input type="button" name="delete" value="Delete" onclick="openform1()"  class="btn btn-success">
        <div id="popup-form">
        <form name="createstate" action="other.php" method="post">
           STATE ID:<input type="text" name="state_id"><br>
           STATE NAME:<input type="text" name="state_name"><br><br>
    <input type="submit" name="create" value="Create">
    <button type="submit" name="create" onclick="closeForm()">Close</button>
</form>
          </div>
        </center>
        <div id="delete-form" onsubmit="return openform1()">
  <form name="deletestate" action="delete.php" method="post">
    STATE ID:<input type="text" name="state_id"><br>
<br>
    <input type="submit" name="delete" value="Delete">&nbsp;&nbsp;
    <button type="button" name="delete" onclick="closeForm()">Close</button>
</form>
      </div>
           <div class="update" id="modify-form" onsubmit="return openForm()">
           <form method="post" action="state_master.php">
            <label for="id">ID:</label>
          <input type="text" name="state_id" id="state_id" >
          <br>
          <label for="name">Name:</label>
          <input type="text" name="state_name" id="state_name" >
          <br>
          <input type="submit" value="Save">&nbsp;&nbsp;
          <button type="submit" name="modify" onclick="closeForm()">Close</button>
</form>  
      </div>
  </div>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js"></script>-->
  <script>
    const selectOption = document.getElementById('select');
    const popupForm = document.getElementById('popup-form');

    selectOption.addEventListener('change', function() {
    if (this.value === 'other') {
            popupForm.style.display = 'block';
          } else {
            popupForm.style.display = 'none';
          }
        });
  </script>

<script >
 function openform(){
        document.getElementById("modify-form").style.display = 'block';
      } ;
  function closeForm() {
  document.getElementById("modify-form").style.display = "none";
};
</script>


<script >
 function openform1(){
        document.getElementById("delete-form").style.display = 'block';
      } ;
  function closeForm() {
  document.getElementById("delete-form").style.display = "none";
};
</script>
<script>
    function state(){
            var state1 = document.getElementById(select);
            VAR stateId=state1.options[state1.selectedIndex].value;
            alert('stateId');
    }
    function closeForm() {
  document.getElementById("popup-form").style.display = "none";
};
</script>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'footer.php';?>
</body>
</html>



<?php
include('connection.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $state_id = $_POST['state_id'];
    $state_name = $_POST['state_name'];
    // Update the database
    $result = pg_query($conn, "UPDATE state_master SET state_name='$_POST[state_name]' WHERE state_id='$_POST[state_id]'");

    // Check if the update was successful
    if ($result) {
        echo '<script>alert("Record updated successfully.")</script>';
    } else {
        echo '<script>alert("Error updating record: ")</script>' . pg_last_error($conn);
    }
}

// Close the database connection
pg_close($conn);
?>




