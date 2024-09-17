<?php
/*require_once '../kasjah.php'; // Include the session management functions
if (!is_logged_in()) {
   header('Location: ../index.php'); // Redirect to the login page if not logged in
    exit();
}*/
echo "Sätted";

$sql="SELECT id, Tootab, Kalender, Muusika FROM seaded";
$tulem=$mysqli->query($sql);
$kalRida=$tulem->fetch_assoc();
if($kalRida['Tootab']==1){
	$tootab="checked";
	} else{
		$tootab="";
	}
?>
<p>
<input type="checkbox" id="kasTootan" value="<?php echo $kalRida['id']; ?>" <?php echo $tootab; ?> onchange="kellaToo()">
<label for="kasTootab">Kell töötab? </label><br></p>
<br>

<?php
echo "Hetkel heliseb kell kalendri {$kalRida['Kalender']} järgi ja heliseb muusika {$kalRida['Muusika']} järgi.";

?>
 <hr>
 <form id="muusikus">
 <label for="mValik">vali lugu:</label>
    <select id="mValik" name="mValik">
    <?php

$directory = 'muusika/';

$files = scandir($directory);

$files = array_diff($files, array('.', '..'));

foreach ($files as $file) {
    echo ' <option value="'.$file.'">'.$file.' </option>';
}
?>
</select>
    <button type="button" onclick="saadaMuudatus()">Muuda</button>
 </form>
<hr>
<select>
<?php
								$query = "SHOW TABLES LIKE 'KP_%'";
								$result = $mysqli->query($query);
																if ($result->num_rows > 0) {
									while ($row = $result->fetch_row()) {
										?>
<?php
										$nimi=substr($row[0],3);
									  echo '<option value="KP_'.$nimi.'">'.$nimi.'</option>';
									   
									}
								}
?>

</select>
<hr>
<h2>Lae muusika</h2>

<form action="lae.php" method="post" enctype="multipart/form-data">
   (MP3 or WAV):
    <input type="file" name="file" id="file">
    <br><br>
    <input type="submit" value="lae" name="submit">
</form>
<hr>
<h2>Mängi</h2>

<ul>
<?php

$directory = 'muusika/';

$files = scandir($directory);

$files = array_diff($files, array('.', '..'));

foreach ($files as $file) {
    echo '<li>' . $file . ' <audio controls><source src="' . $directory . $file . '" type="audio/mpeg">Your browser does not support the audio element.</audio></li>';
}
?>
</ul>
<script>
function saadaMuudatus(){
let s=document.getElementById("mValik");
let valik=s.value;
console.log(valik);
alert("Muudan lugu");
}
function kellaToo(){
	let kell=document.getElementById("kasTootan").checked;
	alert("Kella töö");
	console.log(kell);
	}
</script>
