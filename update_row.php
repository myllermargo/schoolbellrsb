<?php

require_once("../testing/con.php");

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
} 


if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['piniMuutus'] )&& intval($_POST['piniMuutus'])==1)//
{
    $id=$_POST['id'];
    $seade = sanitize_input($_POST['seade']);
    $vaartus=sanitize_input($_POST['vaartus']);
    $sql=sprintf("UPDATE seaded SET %s=%s WHERE id=%s",$seade, $vaartus, $id);
    echo $sql."  ".$vaartus."  ".$seade."  ".$id;
    if($stmt=$mysqli->prepare($sql)){
       // $stmt->bind_param("ssi", $seade, $vaartus, $id );
        print_r($stmt);
        if($stmt->execute()){
           echo "siin";
            if ($stmt->error) {
    echo "Error: " . $stmt->error;
}
         header("Location: index.php?leht=seaded");
            exit();
        }else{
            header("Location: index.php?leht=seaded");
           } 
    }
}
//Kas kell töötab muutmine
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['TootabS']) && !empty($_POST['TootabS']))
{
    $id=sanitize_input($_POST['id']);
    $seade = sanitize_input($_POST['seade']);
    $vaartus=sanitize_input($_POST['vaartus']);
    if($vaartus=="false"){
        $muutus='0';
           }else{
        $muutus='1';
           }
    $sql="UPDATE seaded SET Tootab =? WHERE id=?";
    if($stmt=$mysqli->prepare($sql)){
        $stmt->bind_param("ss", $muutus, $id );
        if($stmt->execute()){
           
            if ($stmt->error) {
    echo "Error: " . $stmt->error;
}
         header("Location: index.php?leht=seaded");
            exit();
        }else{
            header("Location: index.php?leht=seaded");
           }
    }
}

//Kelaaaegade muutmine, kellad lehel
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['table_name']) && isset($_POST['id']) && $_POST['muutus']=="KellMuuda") {
    $table_name = sanitize_input($_POST['table_name']);
    $id = sanitize_input($_POST['id']);

    $kell = isset($_POST['kell']) ? sanitize_input($_POST['kell']) : '';
    $lisa = isset($_POST['lisa']) ? sanitize_input($_POST['lisa']) : '';

    $sql = "UPDATE `$table_name` SET kell = ?, lisa = ? WHERE id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
       
        $stmt->bind_param("ssi", $kell, $lisa, $id);

        if ($stmt->execute()) {

            $table_name=substr($table_name,3);
            header("Location: index.php?leht=kellad&table_name=$table_name");
            exit();
        } else {

            echo "update läks valesti: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "stm is midagi nihu " . $mysqli->error;
    }
}

//Puhkepäevade muutmine
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['muutus'] == "muudanK") {
	if(empty($table_name) || empty($id) || empty($algusPaev) || empty($lopuPaev) || empty($kommentaar)) {
		echo "Mõni väärtus on puudu";
	}
	$table_name = sanitize_input($_POST['table_name']); //Muudetav tabel, hetkel Puhad
    $id = sanitize_input($_POST['rowID']); //Muudetava rea ID
	$algusPaev = sanitize_input($_POST['kell1']); //Alguse kuupäev
	$lopuPaev = sanitize_input($_POST['kell2']); //Lõpu kuupäev
	$kommentaar = sanitize_input($_POST['lisa']);
	
	$sql = "UPDATE `$table_name` SET kuupaevA = ?, kuupaevL = ?, varu = ? WHERE id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
       
        $stmt->bind_param("ssss", $algusPaev, $lopuPaev, $kommentaar, $id);

        if ($stmt->execute()) {

            header("Location: index.php?leht=puhkepaevad");
            exit();
        } else {

            echo "update läks valesti: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "stm is midagi nihu " . $mysqli->error;
    }
	
	
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['muutus'] == "muudanEri") {
	if(empty($_POST['ID']) || empty($_POST['kuupaev']) || empty($_POST['kalender']) || empty($_POST['mValik'])) {
		echo "Mõni väärtus on puudu";
		exit();
	}

	$id = sanitize_input($_POST['ID']); //Muudetava rea ID
	$kuupaev = sanitize_input($_POST['kuupaev']);
	$kalender = sanitize_input($_POST['kalender']);
	$mValik = sanitize_input($_POST['mValik']);
	
	$sql = "UPDATE Kuupaevad SET kuupaev = ?, kalender = ?, heli = ? WHERE id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
       
        $stmt->bind_param("ssss", $kuupaev, $kalender, $mValik, $id);

        if ($stmt->execute()) {

            header("Location: index.php?leht=kuupaevad");
            exit();
        } else {

            echo "update läks valesti: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "stm is midagi nihu " . $mysqli->error;
    }
	
}
?>
