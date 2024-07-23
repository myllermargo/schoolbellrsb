<?php
date_default_timezone_set('Europe/Tallinn'); 
require_once("con.php");

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($_GET['muutus'] == "muuda") {
	echo "a";
	$table_name = sanitize_input($_GET['table_name']);
    $id = sanitize_input($_GET['id']);
   
    $sql = "SELECT * FROM `$table_name` WHERE id = $id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
     
        $row = $result->fetch_assoc();
		?>
		<h2>Muuda kellaaega</h2>
		<div class="col-xl-12">
			<form action="#" id="updateTimeForm" method="post">
				<input type="hidden" id="table_name" name="table_name" value="<?php echo $table_name; ?>">
				<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
				<input type="hidden" id="muutus" name="muutus" value="KellMuuda">
				<div class="row">
					<span><span class="text-danger">*</span> - nõutud väli</span></span>
					<div class="form-group">
						<div class="col-3 mt-2">
							<label for="kell">Kellaaeg <span class="text-danger">*</span></label>
							<input type="time" name="kell" class="form-control shadow mt-2" value="<?php echo $row['kell']; ?>" required>
						</div>
						<div class="col-3 mt-2 mb-4">
							<label for="lisa">Lisainfo</label>
							<input type="text" name="lisa" class="form-control shadow mt-2" value="<?php echo $row['lisa']; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-3">
							<input type="submit" class="btn btn-outline-success saveChangesBtn" style="float: right;" value="Salvesta muudatused">
						</div>
					</div>
				</div>
			</form>
		</div>
	
<?php
	} else {
		echo "ridu pole";
	}
} else if ($_GET['muutus']=='muudanK'){
    $id = sanitize_input($_GET['id']);
    $kuvasql=sprintf("SELECT * FROM Puhad WHERE id=%s ", $id);
$stmt=$mysqli->prepare($kuvasql);
$stmt->execute();
$tulem=$stmt->get_result();
$tulemus=$tulem->fetch_assoc();
?>
    
    <h2>Muudan pühade kuupäeva/si</h2>  
	<div class="col-xl-12"> 
    <form name="muudanP" id="muudanP" action="#" method="post">
    <input type="hidden" name="table_name" value="<?php echo "Puhad"; ?>">
	<input type="hidden" name="rowID" value="<?= $tulemus['id']; ?>">
	<input type="hidden" name="muutus" value="muudanK">
	<div class="form-group mb-4">
		<label for="kell1">Alguse kuupäev:</label>
		<input type="date" name="kell1" value="<?php echo $tulemus['kuupaevA']; ?>"  required>
	</div>
	<div class="form-group mt-2 mb-4">
		<label for="kell2">Lõpu kuupäev:</label>
		<input type="date" name="kell2" value="<?php echo $tulemus['kuupaevL']; ?>"  required>
	</div>
	<div class="form-group mt-2 mb-2">
		<label for="lisa">Kommentaar:</label>
		<input type="text" name="lisa" value="<?php echo $tulemus['varu']; ?>" >
	</div>
	<div class="form-group">
		<div class="col-sm-3 mt-2">
			<input type="submit" value="Salvesta püha" class="btn btn-outline-success puhadSaveBtn">
		</div>
	</div>
</form>
</div>  
    <?php
} else if($_GET['muutus'] == 'muudanEri')  {
	    $id = sanitize_input($_GET['id']);
		$kuvasql=sprintf("SELECT * FROM Kuupaevad WHERE id=%s ", $id);
		$stmt=$mysqli->prepare($kuvasql);
		$stmt->execute();
		$tulem=$stmt->get_result();
		$tulemus=$tulem->fetch_assoc();
	?>
	
	<h2>Muudan erikuupäeva</h2>
	<div class="col-xl-12">
		<form name="muudanEri" id="muudanEri" action="#" method="post">
			<input type="hidden" name="ID" value="<?= $tulemus['id']; ?>">
			<input type="hidden" name="muutus" value="muudanEri">
			<div class="form-group col-3 mb-2">
				<label for="kuupaev">Kuupäev</label><br>
				<input type="date" name="kuupaev" class="mt-2" value="<?= $tulemus['kuupaev']; ?>" class="form-control" required>
			</div>
			<div class="form-group col-3 mb-2">
				<label for="kalender" class="mb-2">Kalender</label>
				<select title="Kalender" class="form-control" name="kalender" class="mr-2">
				<?php
					$query = "SHOW TABLES LIKE 'KP_%'";
					$result = $mysqli->query($query);
													if ($result->num_rows > 0) {
						while ($row = $result->fetch_row()) {
							?>
							<?php
							$nimi=substr($row[0],3);
							if($tulemus['kalender'] == $row[0]) {
								echo '<option value="KP_'.$nimi.'" selected>'.$nimi.'</option>';
							} else {
								echo '<option value="KP_'.$nimi.'">'.$nimi.'</option>';
							}
						   
						}
					}
				?>
				</select>
			</div>
			<div class="form-group col-3 mb-3">
				<label for="mValik" class="mb-2">Helifail</label><br>
				<select title="valik" class="form-control" id="mValik" name="mValik">
					<?php
					//Saab siia muusika failide valiku
					$directory = 'muusika/';

					$files = scandir($directory);

					$files = array_diff($files, array('.', '..'));

					foreach ($files as $file) {
						if($tulemus['heli'] == $file) {
							echo ' <option value="'.$file.'" selected>'.substr($file,0,-17).' </option>';
						} else {
							echo ' <option value="'.$file.'">'.substr($file,0,-17).' </option>';
						}
						
					}
					?>
				</select>
			</div>
			<div class="form-group col-3">
				<input type="submit" class="btn btn-outline-success saveEriBtn" style="float: right;" value="Salvesta">
			</div>
		</form>
	</div>
	<?php
}
?>

<script>
$(document).ready(function() {
	
	$(".puhadSaveBtn").click(function(e) {
		e.preventDefault();
		$.ajax({
			url: 'update_row.php',
			method: 'post',
			data: $("#muudanP").serialize(),
			success:function(response) {
				console.log(response);
				Swal.fire({
				  title: "Salvestatud!",
				  text: "Teie tehtud muudatused on salvestatud.",
				  icon: "success"
				}).then(function() {
					window.location = "index.php?page=puhkepaevad";
				});
			}
		});
		
	});
	
	$(".saveChangesBtn").click(function(e) {
		e.preventDefault();
		tableName = $('#table_name').attr('value'); //Vajalik window.location jaoks
		$.ajax({
			url: 'update_row.php',
			method: 'post',
			data: $("#updateTimeForm").serialize(),
			success:function(response) {
				Swal.fire({
				  title: "Salvestatud!",
				  text: "Teie tehtud muudatused on salvestatud.",
				  icon: "success"
				}).then(function() {
					window.location = "index.php?page=kellad&table_name="+tableName.substring(3);
				});
			}
		});
		
	});
	
	$(".saveEriBtn").click(function(e) {
		e.preventDefault();
		$.ajax({
			url: 'update_row.php',
			method: 'post',
			data: $("#muudanEri").serialize(),
			success:function(response) {
				console.log(response);
				Swal.fire({
				  title: "Salvestatud!",
				  text: "Teie tehtud muudatused on salvestatud.",
				  icon: "success"
				}).then(function() {
					window.location = "index.php?page=kuupaevad";
				});
			}
		});
		
	});
	
});
</script>

