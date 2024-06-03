<?php
date_default_timezone_set('Europe/Tallinn'); 
require_once("con.php");
$pin = 17;
$nr=0;
$test=false;

$tana=date("Y-m-d");
$sql = sprintf("SELECT kuupaevA AS algus, kuupaevL AS lopp FROM Puhad WHERE '%s' BETWEEN date(kuupaevA) AND date(kuupaevL)", $tana);
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$algus = ($row['algus'] ?? '');
$lopp = ($row['lopp'] ?? '');
if($algus){
    $pyha=false;
} else {
    $pyha=true;
}
$tootLause="SELECT * FROM seaded";
$tootTulem=mysqli_query($mysqli, $tootLause);
$seadRida=mysqli_fetch_assoc($tootTulem);
if($seadRida['Tootab']==1){
    $tootab=true;
} else {
    $tootab=false;
}
$ndlapaev=$seadRida['ndlaPaev'];
$musa=$seadRida['Muusika'];
 if(date('w')==$ndlapaev){
    switch($ndlapaev){
	    case "1":
	    case "2":
	    case "3":
	    case "4":
	    case "5":
	$kelladTbl=$seadRida['ndlpKalender'];
	    break;
	    case "6":
	    $kelladTbl=$seadRida['Kalender'];
	    break;
	    
}
}else {
	$kelladTbl=$seadRida['Kalender'];
}
checkTodaysTable($mysqli, $musa, $kelladTbl);

$lause=sprintf("Select * from %s",$kelladTbl);
$tulemus=mysqli_query( $mysqli, $lause);
if(mysqli_num_rows($tulemus)>0){
    while($row = mysqli_fetch_assoc($tulemus))    {
        $phpdate = strtotime($row["kell"]);
        $number=date("H:i",$phpdate);
        if($number==date("H:i") && $tootab && $pyha){
            togglePin($pin ,$nr, $musa);
            break;
            }
    }
}
function checkTodaysTable(&$mysqli, &$musa, &$kelladTbl) {
	$sql = "SELECT * FROM Kuupaevad WHERE kuupaev = CURRENT_DATE() LIMIT 1"; //Limit 1, et ta saaks maksimaalselt ühe rea ainult võtta,
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) { //Kui on tänase kuupäevaga ridasid, siis
		$row = $result->fetch_assoc();
		$musa=$row['heli'];
		$kelladTbl=$row['kalender'];
		}	
}
function togglePin($pin, $nr, $musa) {
    $cmd = "pigs w $pin 1";
    shell_exec($cmd);
    //sleep(2);
    usleep(500000);
    $cmd = "pigs w $pin 0";
    shell_exec($cmd);
    sleep(1);
    $cmd =sprintf("killall mpg123 &> /dev/null; mpg123 ../koolikell/muusika/%s  scriptname >/dev/null 2>/dev/null", $musa);
    shell_exec($cmd);
}
if ($test){
    
    togglePin($pin ,$nr, $musa);
}
mysqli_close($mysqli);
?>
