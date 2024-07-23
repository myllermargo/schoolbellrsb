<style>      

table, th, td {
  border-collapse: separate;
  border-spacing: 8px;
  border: solid black 1px;
  padding: 10px;
  border-radius: 6px;
  box-shadow: 3px 10px 20px #57B6F0 ;
}

</style>
<?php 
echo "<h1>Erikuupäevad</h1>";

$sql="SELECT * FROM Kuupaevad";
$kask=$mysqli ->query($sql);
?>
<table id='Kuupaevad' style='width: 100%;'  >
<thead>
	<tr>
	<th>ID</th>
	<th>kuupäev</th>
	<th>kellaajad</th>
	<th>heli</th>
	<th>tegevus</th>
	</tr>
</thead>


<?php
while($result=$kask ->fetch_assoc()){
	echo "<tr>";
	echo "<td>".$result['id']."</td><td>".$result['kuupaev']."</td><td>".substr($result['kalender'],3)."</td><td>".substr($result['heli'],0,-17)."</td>";
	echo "<td><div style='float:left;'><a href='?page=edit_row&muutus=muudanEri&id=".$result['id']."' tooltip='Muuda'><i class='fa-solid fa-pen-to-square fa-xl'></i></a> 
		   | <a href='' class='deleteTimeBtn' tooltip='Kustuta' id='".$result['id']."' table_name='Kuupaevad' ><i class='fa-solid fa-trash fa-xl'></i></a></div></td>";
           
	echo "</tr>";
 }


?>
</table>
<hr>
<form action="insert_rowPuh.php" method="post" id="LisaKuup" name="LisaKuup">
	<input type="hidden" name="EriKuup" value="Eri">
    <input type="hidden" name="table_name" value="Kuupaevad">
     kuupäev: <input type="date" name="KuuP"   required>  <label class="mb-2">Vali kellaajad, mida kasutada:</label>
			<select title="Kellad" class="form-control" name="Kellad" id="tabelChoice" class="mr-2" style="width: 25%; display: inline;">
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
    <label for="file" class="mb-2">Vali lugu:</label>
			    <select title="valik" class="form-control" id="mValik" name="mValik" style="width: 25%; display: inline;" name="mValik">
					<?php
					//Saab siia muusika failide valiku
					$directory = 'muusika/';

					$files = scandir($directory);

					$files = array_diff($files, array('.', '..'));

					foreach ($files as $file) {
						echo ' <option value="'.$file.'">'.substr($file,0,-17).' </option>';
					}
					?>
				</select>
    <input type="submit" class="btn btn-outline-success LisaKuupaev" value="Lisa kuupäev">
</form>
<script src="./js/kasud.js" ></script>
