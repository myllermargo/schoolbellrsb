<?php
date_default_timezone_set('Europe/Tallinn'); 
require_once("../testing/con.php");

if(isset($_POST['table_name'])) {
    // Sanitize the table name
    
    
    $table_name = filter_var($_POST['table_name'], FILTER_SANITIZE_STRING);
     if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare SQL statement to drop table
    $sql = "DROP TABLE IF EXISTS `$table_name`";

    // Execute SQL statement
    if ($mysqli->query($sql) === TRUE) {
        // Table deleted successfully
        echo "Table '$table_name' deleted successfully";
    } else {
        // Error occurred while deleting table
        echo "Error deleting table: " . $mysqli->error;
    }

    // Close connection
    
} else {
    // If table_name is not set in the POST request, return an error message
    echo "Error: Table name not provided";
}
$mysqli->close();
?>
