<?php
require_once("con.php");




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['table_name']) && isset($_POST['id'])) {
    $table_name = sanitize_input($_POST['table_name']);
    $id = sanitize_input($_POST['id']);
   
    $sql = "DELETE FROM `$table_name` WHERE id = ?";

    
    if ($stmt = $mysqli->prepare($sql)) {
       
        $stmt->bind_param("i", $id);
        
        
        if ($stmt->execute()) {
           
            $table_name=substr($table_name,3);
            //header("Location: index.php?page=kellad&table_name=$table_name");
            echo "Rrida läinud";
        } else {
           
            echo "Error deleting row: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Käsus mingi jama " . $mysqli->error;
    }
} else {
    echo "Tabeli nime ei ole";
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

