<?php
require_once("con.php");

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['table_name'])) {
    $table_name = sanitize_input($_POST['table_name']);

    $kell = isset($_POST['kell']) ? sanitize_input($_POST['kell']) : '';
    $lisa = isset($_POST['lisa']) ? sanitize_input($_POST['lisa']) : '';


    $sql = "INSERT INTO `$table_name` (kell, lisa) VALUES (?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
  
        $stmt->bind_param("ss", $kell, $lisa);
 
        if ($stmt->execute()) {

            echo "Row inserted successfully";
            $table_name=substr($table_name,3);
            header("Location: index.php?leht=kellad&table_name=$table_name");
        } else {
            
            echo "Error inserting row: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "sql käsuga teema " . $mysqli->error;
    }
} else {
    echo "tabeli nime ei ole";
}
?>

