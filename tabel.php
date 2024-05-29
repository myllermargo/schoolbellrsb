<?php
date_default_timezone_set('Europe/Tallinn'); 
require_once("../testing/con.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kellaaegade tabeli loomine</title>
</head>
<body>
	<script>
        function deleteTable(tableName) {
            // Ask for confirmation before deleting
            if (confirm("Are you sure you want to delete table '" + tableName + "'? This action cannot be undone.")) {
                // Perform the deletion via AJAX
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Table deleted successfully
                            alert(xhr.responseText);
                            location.reload(); // Refresh the page
                        } else {
                            // Error occurred
                            alert("Error deleting table: " + xhr.responseText);
                        }
                    }
                };
                xhr.open("POST", "kustuta.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("table_name=" + encodeURIComponent(tableName));
            }
        }
    </script>
    <h1>Loo aegade tabel: </h1>
    <form action="" method="post">
        <label for="table_name">Kellaaja tabeii nimi (tuleb menüüsse):</label>
        <input type="text" id="table_name" name="table_name" required><br><br>
        <input type="submit" value="Loo tabel">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

function puhastan($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
        $table_name = puhastan($_POST["table_name"]);
        

        $uus_tabel="KP_".$table_name;
      
        $sql = "CREATE TABLE IF NOT EXISTS `$uus_tabel` (
                `id` int(11) NOT NULL AUTO_INCREMENT,`kell` time DEFAULT NULL,`lisa` text DEFAULT NULL,PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

        if ($mysqli->query($sql) === TRUE) {
			
			
        echo "Tabel '$uus_tabel' loodud";
    } else {
        echo "Midagi läks nihu " . $mysqli->error;
    }
    
    

        
print_r($stmt);
           
            $stmt->close();
        
    }
$query = "SHOW TABLES LIKE 'KP_%'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        echo "<p>".substr($row[0],3)."  <button onclick=\"deleteTable('$row[0]')\"> Kustuta </button></p><br>";
    }
} else {
    echo "No tables found.";
}

  $mysqli->close();  ?>
</body>
</html>
