<?php
if (!defined('koolikell')) {
    exit('otse ei saa');
}
require_once("../testing/con.php");

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = "seaded";
    //$id = 1;
	
	//Eraldi tehtud, sest muidu SQL karjub, et talle ei sobi kui miski on puudu SQL statemendist
	if(isset($_POST['action']) && $_POST['action'] == "updateKalender") { //Kalendri uuendamine
		$sKalender = isset($_POST['kalender']) ? sanitize_input($_POST['kalender']) : ''; //sättetest valitud kalender
		$sql = "UPDATE `$table_name` SET Kalender = ? WHERE id = 1";
		$bindParam1 = "s";
		$bindParam2 = $sKalender;
	} else if($_POST['action'] == "updateMuusika") { //Muusika uuendamine
		$sMuusika = isset($_POST['mValik']) ? sanitize_input($_POST['mValik']) : ''; //sättetest valitud muusika
		$sql = "UPDATE `$table_name` SET Muusika = ? WHERE id = 1";
		$bindParam1 = "s";
		$bindParam2 = $sMuusika;
	}

    if ($stmt = $mysqli->prepare($sql)) {
       
        $stmt->bind_param($bindParam1, $bindParam2);

        if ($stmt->execute()) {

            $table_name=substr($table_name,3);
            header("Location: index.php?leht=satted");
            exit();
        } else {

            echo "update läks valesti: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "stm is midagi nihu " . $mysqli->error;
    }
} else {
    echo "Tabeli nime ei ole.";
}
?>
