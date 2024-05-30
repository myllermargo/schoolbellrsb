<?php
require_once("con.php");


function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//echo "siin".",".$_POST['table_name'].",".$_POST['KuuP'].",".$_POST['Kellad'].",".$_POST['mValik'];
echo "siin";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['EriKuup']) && $_POST['EriKuup']=="Eri") {
    $table_name = sanitize_input($_POST['table_name']);
    $kuupaev = sanitize_input($_POST['KuuP']);
    $ajadTbl=sanitize_input($_POST['Kellad']);
    $muusika = sanitize_input($_POST['mValik']);
    


   $sql = "INSERT INTO `$table_name` (kuupaev, kalender, heli) VALUES (?, ?, ?)";
    echo "{$table_name}, {$kuupaev},  {$muusika}, {$ajadTbl},   {$sql}";
    
    $kask=$mysqli->prepare($sql);
    $kask->bind_param("sss",$kuupaev,$ajadTbl,$muusika);
    $kask->execute();
    $kask->close();
}
?>


