<?php
if (!defined('koolikell')) {
    exit('otse ei saa');
}
echo "Sätted";

?>
<br>
<?php

$sql="SELECT id, Tootab, Kalender, Muusika, ndlaPaev, ndlpKalender, PinOne, PinTwo FROM seaded";
$tulem=$mysqli->query($sql);
$kalRida=$tulem->fetch_assoc();
if($kalRida['Tootab']==1){
	$tootab="checked";
	} else{
		$tootab="";
	}
?>
<p>

<style>
.kaldu{
}
</style>
<?php
$lugu=substr($kalRida['Muusika'],0,-17);
$ajad=substr($kalRida['Kalender'],3);

checkTodaysTable($mysqli, $lugu, $ajad);


echo "<p>Hetkel heliseb kell kellaaegade: <em><b>{$ajad}</b></em> järgi ja heliseb muusika:  <em><b>{$lugu}</b></em> järgi.</p>";


function checkTodaysTable(&$mysqli, &$lugu, &$ajad) {
	$sql = "SELECT * FROM Kuupaevad WHERE kuupaev = CURRENT_DATE() LIMIT 1"; //Limit 1, et ta saaks maksimaalselt ühe rea ainult võtta,
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) { //Kui on tänase kuupäevaga ridasid, siis
		$row = $result->fetch_assoc();
		$lugu=$row['heli'];
		$ajad=$row['kalender'];
		}	
}
function checkRepeated(){
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
}
}
?>
<hr>
<form id="tootabSettings" method="post">
<input type="checkbox" name="kasTootan" id="kasTootan" value="<?php echo $kalRida['id']; ?>" <?php echo $tootab; ?> data1="Tootab" onclick="tootab()">
<label for="kasTootan">Kell töötab? </label></p>
</form>
 <hr>
<form action ="#" method="post" id="muusikaValik">
	<div class="col-lg-9">
		<div class="form-group">
			<label for="file" class="mb-2">Vali lugu:</label><br>
			    <select title="valik" class="form-control" id="mValik" name="mValik" style="width: 25%; display: inline;" name="mValik">
					<?php
					//Saab siia muusika failide valiku
					$directory = 'muusika/';

					$files = scandir($directory);

					$files = array_diff($files, array('.', '..'));

					foreach ($files as $file) {
						$fileEdited = substr($file,0,-17);
						if($lugu == $fileEdited) { //Selleks siin, et selectis oleks valitud lugu, mis on hetkel kasutusel
							echo ' <option value="'.$file.'" selected>'.substr($file,0,-17).' </option>';
						} else {
							echo ' <option value="'.$file.'">'.substr($file,0,-17).' </option>';
						}
					}
					?>
				</select>
				<input type="submit" class="btn btn-outline-success btnSaveMusic mb-1" value="Salvesta muusika">
		</div>
	</div>
</form>

<hr>
<form action="#" method="post" id="kellaTabel">
	<div class="col-lg-9">
		<div class="form-group">
			<label class="mb-2">Vali kellaajad, mida kasutada:</label><br>
			<select title="Kalender" class="form-control" name="kalender" id="tabelChoice" class="mr-2" style="width: 25%; display: inline;">
			<?php
											$query = "SHOW TABLES LIKE 'KP_%'";
											$result = $mysqli->query($query);
																			if ($result->num_rows > 0) {
												while ($row = $result->fetch_row()) {
													?>
			<?php
													$nimi=substr($row[0],3);
													if($ajad == $nimi) {
														echo '<option value="KP_'.$nimi.'" selected>'.$nimi.'</option>';
													} else {
														echo '<option value="KP_'.$nimi.'">'.$nimi.'</option>';		
													}
												   
												}
											}
			?>

			</select>
			<input type="submit" class="btn btn-outline-success btnSalvestaKalender mb-1" value="Salvesta kalender">
		</div>
	</div>
</form>
<hr>
<h2>Lae muusikat</h2>

<form action="lae.php" method="post" enctype="multipart/form-data">
   <label for="file">(MP3 or WAV)</label>
    <input type="file" name="file" id="file">
    <br><br>
    <input type="submit" value="Lae ülesse" class="btn btn-outline-success" name="submit">
</form>
<hr>
<h2>Mängi</h2>

<ul>
<div class="col-lg-9">
	<div class="form-group" style="display: inline;">
		<?php
		//Saab muusika failid
		$directory = 'muusika/';

		$files = scandir($directory);

		$files = array_diff($files, array('.', '..'));

		foreach ($files as $file) {
			echo '
				<li>
				' . substr($file,0,-17) . '<br>
				<audio controls><source src="' . $directory . $file . '" type="audio/mpeg">Your browser does not support the audio element.</audio>
				<a href="#" class="deleteMusicBtn trashButton" id="'.$file.'"><i class="fa-solid fa-trash text-danger fa-xl"></i></a></li>
				
				';
			?>
			<br>
			<?php
		}
		?>
	</div>
</div>
</ul>
<p>
<form action="#" method="post" id="kellaTbl2">
	<div class="col-lg-9">
		<div class="form-group">Kordused:
			<select>
			<option selected="selected">Vali päev millal kordub</option>
			<option value="1">Esmaspäev</option>
			<option value="2">Teisipäev</option>
			<option value="3">Kolmapäev</option>
			<option value="4">Neljapäev</option>
			<option value="5">Reede</option>
			<option value="6">Ära korda</option>
			</select>
			<label class="mb-2">Vali kellaajad, mida kasutada:</label>
			<select title="Kalender" class="form-control" name="kalender" id="tabelChoice" class="mr-2" style="width: 25%; display: inline;">
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
			<input type="submit" class="btn btn-outline-success btnSalvestaKordus mb-1" value="Salvesta kordus">
		</div>
	</div>
</form>
</p><br><hr>
<p>Kellaaegade tabeli loomine/kustutamine</p>
<a href="index.php?leht=tabel" >Link</a><br>
<hr>
<p>Relee pinnid(PS! Muuda siis kui tead mida teed!!):</p>
<form>
<label for="pin1" name="silt1"> Relee1:</label><input name="PinOne" type="number" id="pin1" value="<?= $kalRida['PinOne']; ?>" style="width: 7ch;" min="7" max="25" onchange="pinnideMuutus(name,value)"><br>
<label for="pin2" name="silt2"> Relee2:</label><input name="PinTwo" type="number" id="pin2" value="<?= $kalRida['PinTwo']; ?>" style="width: 7ch;" min="7" max="25" onchange="pinnideMuutus(name,value)">
</form>
<hr>
<script>
	function pinnideMuutus(nimi,sisend){
		alert(sisend+nimi);
		let rida="1";
		let pinMuut="1";
			$.ajax({
		url:'update_row.php',
		method:'post',
		data:{
			id:rida,
			piniMuutus:"1", 
			seade:nimi,
			vaartus:sisend,
			 dataType: 'json',
    success: function (textStatus, status) {
        console.log(textStatus);
        console.log(status);
    }
		},
		success:function(response) {
			console.log(response);
		Swal.fire('pin ümberlülitatud!', '', 'success');
		   }
	});
}
//Kalendri salvestamine
$(".btnSalvestaKalender").click(function(e) { //Salvesta kalender nupu vajutamisel
	e.preventDefault(); //preventib
	saadaTabel(); //käivitab functioni, datat pole vaja saata, function saab ise kõik elementide kaudu kätte
});
//Salvest kordus
 $(".btnSalvestaKordus").click(function(e) { //Salvesta kalender nupu vajutamisel
	e.preventDefault(); //preventib
	saadaKordus(); //käivitab functioni, datat pole vaja saata, function saab ise kõik elementide kaudu kätte
});
//Muusika salvestamine
$(".btnSaveMusic").click(function(e) { //Salvesta kalender nupu vajutamisel
	e.preventDefault(); //preventib
	saadaMuusika(); //käivitab functioni, datat pole vaja saata, function saab ise kõik elementide kaudu kätte
});

//Muusika faili kustutamine
$(".deleteMusicBtn").click(function(e) { //Salvesta kalender nupu vajutamisel
	e.preventDefault(); //preventib
	let failiNimi = $(this).attr('id'); //Saab vajutatud nupu ID, sest seal on muusikafaili nimi, mida kustutada
	console.log(failiNimi);
	Swal.fire({
	  title: "Kas sa oled kindel?",
	  text: "Teil ei ole võimalik antud faili taastada!",
	  icon: "warning",
	  showDenyButton: true,
	  showCancelButton: true,
	  confirmButtonText: 'Jah',
	  denyButtonText: 'Ei',
	  }).then((result) => {
		  if (result.isConfirmed) {
			  kustutaMuusika(failiNimi); //Kustutab muusika faili, function
		  } else if (result.isDenied) {
			Swal.fire('Faili ei kustutatud', '', 'info');
		  }
	});
});
 
//Functionid algab
function tootab(){		
	let id=document.getElementById('kasTootan').value;
	let tulp=document.getElementById('kasTootan').getAttribute('data1');
	let vaartus=document.getElementById('kasTootan').checked;
	//console.log(id+"  "+tulp+" "+ vaartus);
	let tootab="1";
	$.ajax({
		url:'update_row.php',
		method:'post',
		data:{
			id:id, 
			TootabS:tootab,
			seade:tulp,
			vaartus:vaartus
		},
		success:function(response) {
			//console.log(response);
		Swal.fire('Kell ümberlülitatud!', '', 'success');
		   }
	});
}
	
	
	
function saadaMuusika(){
	let s = document.getElementById("mValik");
	let valik = s.value; //Valitud muusika fail
	console.log(valik);
	let dbTable = "seaded";
	let action = "updateMuusika"; //Saadan actioni, et update_settingus saaks teha eraldi sql statementi
	let rowID = 1;
	$.ajax({
		url: 'index.php?leht=update_settings',
		method: 'post',
		data: {table_name: dbTable, mValik: valik, id: rowID, action: action},
		success:function(response) {
			Swal.fire('Salvestatud muusika valik!', '', 'success').then(function() {
				location.reload(); //Refreshib lehte, et kohe oleks lehel uus muusika valik näha
			});
		}
	});
}
function kellaToo(){
	let kell=document.getElementById("kasTootan").checked;
	alert("Kella töö");
	console.log(kell);
	}
	
//Kalendri tabeli function
function saadaTabel() {
	let dbTable = "seaded";
	let action = "updateKalender"; //Saadan actioni, et update_settingus saaks teha eraldi sql statementi
	let tableName = document.getElementById("tabelChoice");
	let kalender = $('#tabelChoice').val();
	console.log(kalender);
	let rowID = 1;
	$.ajax({
		url: 'index.php?leht=update_settings',
		method: 'post',
		data: {table_name: dbTable, kalender: kalender, id: rowID, action: action},
		success:function(response) {
			Swal.fire('Salvestatud!', '', 'success').then(function() {
				location.reload(); //Refreshib lehte, et kohe oleks tekstis uus tabeli nimi näha
			});
		}
	});
	
}

function saadaKordus() {
	let dbTable = "seaded";
	let action = "updateKordus"; //Saadan actioni, et update_settingus saaks teha eraldi sql statementi
	let tableName = document.getElementById("tabelChoice");
	let kalender = $('#tabelChoice').val();
	console.log(kalender);
	let rowID = 1;
	$.ajax({
		url: 'index.php?leht=update_settings',
		method: 'post',
		data: {table_name: dbTable, kalender: kalender, id: rowID, action: action},
		success:function(response) {
			Swal.fire('Salvestatud!', '', 'success').then(function() {
				location.reload(); //Refreshib lehte, et kohe oleks tekstis uus tabeli nimi näha
			});
		}
	});
	
}

function kustutaMuusika(failiNimi) { //failiNimi on muusika faili nimi, mida kustutada
		$.ajax({
		url: 'index.php?leht=delete_file',
		method: 'post',
		data: {failiNimi: failiNimi},
		success:function(response) {
			console.log(response);
			Swal.fire('Fail edukalt kustutatud!', '', 'success').then(function() {
				location.reload(); //Refreshib lehte, et kohe oleks tekstis uus tabeli nimi näha
			});			
		}
	});
	
}
</script>
