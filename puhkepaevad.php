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

$tana=date("Y-m-d");

$sql = sprintf("SELECT kuupaevA AS algus, kuupaevL AS lopp FROM Puhad WHERE '%s' BETWEEN date(kuupaevA) AND date(kuupaevL)", $tana);
$result = mysqli_query($mysqli, $sql);

$row = mysqli_fetch_assoc($result);
$algus = ($row['algus'] ?? '');
$lopp = ($row['lopp'] ?? '');
if($algus){

echo "hetkel on  ".$algus."  püha kuni ".$lopp ;
} else {
	echo "tavaline päev";
}
$kuvasql="SELECT * FROM Puhad ";
$stmt=$mysqli->prepare($kuvasql);
$stmt->execute();
$tulem=$stmt->get_result();
if($tulem->num_rows>0){
echo "<table id='kellaajadP' style='width: 100%;'  >"; 
		echo "<thead>
				<tr>
					<th>ID</th>
					<th>AlgusKP</th>
					<th>LoppKP</th>
					<th>lisa</th>
					<th>tegevus</th>
				</tr>
			</thead>";
		echo "<tbody>";

while($rida=$tulem->fetch_assoc()){
	$table_name="Puhad";
	$id = $rida["id"];
            echo "<tr>";
            echo "<td>" . $rida["id"] . "</td>";
            if($rida["kuupaevA"]==$tana){
				$aju=" Hetkel olev püha";
			} else { $aju="";}
            echo "<td>" . date($rida["kuupaevA"]) . "{$aju}</td>";
            echo "<td>" . $rida["kuupaevL"] . "</td>";
            echo "<td>" . $rida["varu"] . "</td>";
			echo "<td><div style='float:left;'><a href='?leht=edit_row&muutus=muudanK&table_name=$table_name&id=" . $id . "' tooltip='Muuda'><i class='fa-solid fa-pen-to-square fa-xl'></i></a> 
		   | <a href='' class='deleteTimeBtnRange' id='$id' tooltip='Kustuta' table_name='$table_name' onclickkk=\"OledKindel('$table_name', '{$id}')\"><i class='fa-solid fa-trash fa-xl'></i></a></div></td>";
           
            echo "</tr>";
        }
		echo "</tbody>";
        echo "</table>";
    } else {
        echo "sisu puudub";
    }

$stmt->close();

?>
<form action="insert_rowPuh.php" method="post">
    <input type="hidden" name="table_name" value="<?php echo "Puhad"; ?>">
    <input type="hidden" name="Pyhad" value="Pyha">
    Alguse kuupäev: <input type="date" name="kell1"   required>  Lõpu kuupäev<input type="date" name="kell2"   required>
    kommentaar: <input type="text" name="lisa" >
    <input type="submit" class="btn btn-outline-success" value="Lisa püha/d">
</form>
<script src="./js/kasud.js" >

	
	</script>

