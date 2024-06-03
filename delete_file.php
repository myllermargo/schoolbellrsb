<?php
require_once("con.php");

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['failiNimi'])) {
		$fileName = sanitize_input($_POST['failiNimi']);
		unlink("muusika/".$fileName);
		echo "success";
	} else {
		echo "file name missing";
	}
}
?>
