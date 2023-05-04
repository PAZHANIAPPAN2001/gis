<?php
include('connection.php');

if(isset($_POST['templeid'])) {
    // Sanitize user input
    $templeid = pg_escape_string($_POST['templeid']);
    $filter = pg_escape_string($_POST['filter']);

    // Construct SQL query
    $query = "SELECT * FROM temple WHERE $filter ILIKE '%$templeid%' ORDER BY $filter DESC";
    $result = pg_query($conn, $query) or die('Query failed: ' . pg_last_error());

    // Build search results HTML
    $output = '<select name="temple_result" size="5" style="width: 170px;" onchange="setTextBoxValue(this.value); document.getElementById(\'output_textbox2\').value=this.value;">';
    while($row = pg_fetch_assoc($result)) {
        $output .= '<option class="dropdown-item" value="' . $row[$filter] . '">' . $row[$filter] . '</option>';
    }
    $output .= '</select>';
    

    echo $output;
}
pg_close($conn);
?>

<script>
function setTextBoxValue(value) {
    document.getElementById('templeid').value = value;
}
</script>
