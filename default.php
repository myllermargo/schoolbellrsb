<meta http-equiv="refresh" content="60">

<?php 

echo "Esileht";

?>
<br>
<?php
// tahan tabeli nime
$praeguKell = date('H:i:s');
$seadedSql="SELECT id, Tootab, Kalender, Muusika, ndlaPaev, ndlpKalender FROM seaded";
$seadedtulem=$mysqli->query($seadedSql);
$seadedRida=$seadedtulem->fetch_assoc();
//
$praeguKell = date('H:i:s');
$tana=date("Y-m-d");
//
$sql = sprintf("SELECT kuupaevA AS algus, kuupaevL AS lopp FROM Puhad WHERE '%s' BETWEEN date(kuupaevA) AND date(kuupaevL)", $tana);
$result = mysqli_query($mysqli, $sql);

$row = mysqli_fetch_assoc($result);
$algus = ($row['algus'] ?? '');
$lopp = ($row['lopp'] ?? '');
if($algus){

echo "hetkel on  ".$algus."  püha kuni ".$lopp ;
} else {
	echo "tavaline päev";



//
if ($seadedRida['Tootab']==true){
 $ndlapaev=$seadedRida['ndlaPaev'];
 if(date('w')==$ndlapaev){
switch($ndlapaev){
	case "1":
	case "2":
	case "3":
	case "4":
	case "5":
	$kal=$seadedRida['ndlpKalender'] ;
	break;
	 case "6":
	    $kal=$seadRida['Kalender'];
	    break;
}
}else {
	$kal=$seadedRida['Kalender'] ;
}

checkTodaysTable($mysqli, $kal);
	echo "<p><br>kell töötab aegade tabeli: ".substr($kal,3)." järgi<br>";
	//$sql_before = "SELECT * FROM $kellaajad WHERE kell < '$praeguKell' ORDER BY kell DESC LIMIT 1";


	$sql_before = "SELECT * FROM $kal WHERE kell < '$praeguKell' ORDER BY kell DESC LIMIT 1";
	$result_before = $mysqli->query($sql_before);
	$row_before = $result_before->fetch_assoc();


	$sql_after = "SELECT * FROM $kal WHERE kell > '$praeguKell' ORDER BY kell ASC LIMIT 1";
	$result_after = $mysqli->query($sql_after);
	$row_after = $result_after->fetch_assoc();
	if(empty($row_before['kell'])){
	echo "Eelmine heli oli minevikus <br>";
	} else {
	echo "Möödunud kella helisemise aeg: " . $row_before['kell'] . "<br>";}
	echo "lehe laadimise hetkel kell: ".date('H:i')."<br>";
	if(empty($row_after['kell'])){
	echo "Järgmine helin alles homme hommikul<br>";}
	else{
	echo "Järgmise kella helisemise aeg: " . $row_after['kell'] . "<br></p>";
	}
} else {
	echo "<p>Hetkel kas puhkepäev, püha või kell lihtsalt on välja lülitud</p>";
}
}

function checkTodaysTable(&$mysqli, &$kal) {
	$sql = "SELECT * FROM Kuupaevad WHERE kuupaev = CURRENT_DATE() LIMIT 1"; //Limit 1, et ta saaks maksimaalselt ühe rea ainult võtta,
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) { //Kui on tänase kuupäevaga ridasid, siis
		$row = $result->fetch_assoc();
		
		$kal=$row['kalender'];
		}
	}	
?>
