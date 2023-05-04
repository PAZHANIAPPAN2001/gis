<!DOCTYPE html>
<html>
<head>
    <title>Village Masters</title>
    <?php include 'header.php';?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#state_dropdown').on('change', function() {
                var state = this.value;
                if (state) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_district_village.php',
                        data: {state: state},
                        success: function(data) {
                            $('#district_dropdown').html(data);
                            $('#taluk_dropdown').html('<option value="">Select taluk</option>');
                        }
                    });
                } else {
                    $('#district_dropdown').html('<option value="">Select district</option>');
                    $('#taluk_dropdown').html('<option value="">Select taluk</option>');
                }
            });

            $('#district_dropdown').on('change', function() {
                var district = this.value;
                if (district) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_taluk_village.php',
                        data: {district: district},
                        success: function(data) {
                            $('#taluk_dropdown').html(data);
                        }
                    });
                } else {
                    $('#taluk_dropdown').html('<option value="">Select taluk</option>');
                    $('#village_dropdown').html('<option value="">Select village</option>');
                }
            });
            $('#taluk_dropdown').on('change', function(){
                var taluk = this.value;
                if(taluk){
                    $.ajax({
                        type: 'POST',
                        url: 'get_village.php',
                        data: {taluk: taluk},
                        success: function(data){
                            $('#village_dropdown').html(data)
                        }
                    });
                }else{
                    $('#village_dropdown').html('<option value="">Select village</option>');
                }
            });
        });
    </script>
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
    <center><br><br>
    <h1>Village Masters</h1><br>
    <form>
        <select id="state_dropdown">
            <option value="">Select state</option>
            <?php
            include('connection.php');
        

            // Fetch all unique states from the database
            $states_result = pg_query("SELECT DISTINCT state FROM locations ORDER BY state ASC");

            // Build the HTML for the state dropdown
            while ($row = pg_fetch_assoc($states_result)) {
                echo "<option value='" . $row['state'] . "'>" . $row['state'] . "</option>";
            }

            // Close the database connection
            pg_close($conn);
            ?>
        </select>
        <select id="district_dropdown">
            <option value="">Select district</option>
        </select>
        <select id="taluk_dropdown">
            <option value="">Select taluk</option>
        </select>
         <select id="village_dropdown">
            <option value="">Select village</option>
        </select>
    </form>
    <!-- <select name="select" id="select" onchange='state()'>
          <option value=" " selected disabled>Select</option>
           <?php while ($row = pg_fetch_array($result)){  
          ?>  
         <option value=" <?php $row['state']; ?> "><?php echo $row['district']; ?><?php echo $row['taluk']; ?></option>
        <?php
          }
        ?>        
        <option value="other"> Others </option> 
        </select>-->
        <br><br><br><br>
        <input type="button" name="Add" value="Add" onclick="openform()" class="btn btn-success">&nbsp;&nbsp;
        <input type="button" name="delete" value="Delete" onclick="openform1()"  class="btn btn-success">
        <div id="popup-form">
        <form name="createstate" action="village_other.php" method="post">
           STATE NAME:<input type="text" name="state" required><br><br>
           District Name:<input type="text" name="district" required><br><br>
           Taluk Name:<input type="text" name="taluk" required><br><br>
           Village Name:<input type="text" name="village" required><br><br>
        <input type="submit" name="create" value="Create">
</form>
        </div>
</script>
<div id="delete-form" onsubmit="return openform1()">
  <form name="deletestate" action="village_delete.php" method="post">
    STATE Name:<input type="text" name="state"><br><br>
    District Name:<input type="text" name="district"><br><br>
    Taluk Name:<input type="text" name="taluk"><br><br>
    Village Name:<input type="text" name="village"><br><br>
<br>
    <input type="submit" name="delete" value="Delete">
</form>
      </div>
           <div class="update" id="modify-form" onsubmit="return openForm()">
           <form method="post" action="village_other.php">
            <label for="name">State:</label>
          <input type="text" name="state" id="state" required>
          <br><br>
          <label for="name">District:</label>
          <input type="text" name="district" id="district" required>
          <br><br>
          <label for="name">Taluk:</label>
          <input type="text" name="taluk" id="taluk" required><br><br>
          <label for="name">Village:</label>
          <input type="text" name="village" id="village" required><br><br>
          <input type="submit" value="Save">
</form>  
      </div>
  </div>
    
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
</script>

<script >
 function openform1(){
        document.getElementById("delete-form").style.display = 'block';
      } ;
</script>
</center>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'footer.php';?>
</html>
