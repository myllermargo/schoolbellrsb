   
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




if (true) {
    $table_name = puhasta($_REQUEST['table_name']);


    $table_name="KP_".$table_name;
    $sql = "SELECT * FROM `$table_name`";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {

        echo "<table id='kellaajad' style='width: 100%;' class='mdl-data-table stripe display'>";
		echo "<thead>
				<tr>
					<th>ID</th>
					<th><div style='float: right;'>Kell</div></th>
					<th>Lisa</th>
					<th><div style='float: right;'>Tegevus</div></th>
				</tr>
			</thead>";
		echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
			$id = $row["id"];
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td><div style='float:right;'>" . $row["kell"] . "</div></td>";
            echo "<td>" . $row["lisa"] . "</td>";
           echo "<td><div style='float: right;'><a href='?page=edit_row&muutus=muuda&table_name=$table_name&id=" . $row["id"] . "' tooltip='Muuda'><i class='fa-solid fa-pen-to-square fa-xl'></i></a> 
		   | <a href='#' class='deleteTimeBtn' tooltip='Kustuta' table_name='$table_name' idee='$id'><i class='fa-solid fa-trash fa-xl'></i>$id</a></div></td>";

            echo "</tr>";
        }
		echo "</tbody>";
        echo "</table>";
    } else {
        echo "sisu puudub";
    }
} else {
    echo "tabeli nime ei ole";
}


?>

<br>

<form action="insert_row.php" method="post">
    <input type="hidden" name="table_name" value="<?php echo $table_name; ?>">
	<div class="row col-xl-12">
		<div class="col-sm-3">
			Kell: <input type="time" class="kellaValik form-control shadow" id="kellaValik" name="kell" onblur="validateTimeInput(this)" timeformat="24h" required>
		</div>
		<div class="col-sm-5">
			Lisainfo: <input type="text" class=" form-control shadow" placeholder="Lisada siia märkmed" name="lisa" >
		</div>
		<div class="col-sm-2">
			<input type="submit" class="btn btn-outline-success  mt-4" value="Lisa rida">
		</div>
		</div>
</form>
	<script>
	  const et = {
    locale: 'et',
    format: 'HH:mm',
    // Add other localization settings as needed
};
		new DataTable('#kellaajad', {
			paging: false,
			responsive: true,
			language: {
				url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/et.json',
			},
		});
	$(document).on('click', '.deleteTimeBtn', function() {
    var clickedButtonId = $(this).attr('idee');
    console.log('Clicked button ID:', clickedButtonId);
});
	//$(".deleteTimeBtn").click(function(e) {
	$(document).on('click', '.deleteTimeBtn', function(e) {
	  const rows = document.querySelectorAll('.deleteTimeBtn');
	  
		e.preventDefault();
		console.log("a");
		//var tableName = $('.deleteTimeBtn').attr('table_name');
		var tableName = $(this).attr('table_name');
		//ID = $('.deleteTimeBtn').attr('idee');
		ID = $(this).attr('idee');
		console.log(ID);
		console.log(tableName);
		Swal.fire({
		  title: "Kas sa oled kindel?",
		  text: "Teil ei ole võimalik antud aega taastada!",
		  icon: "warning",
		  showDenyButton: true,
		  showCancelButton: true,
		  confirmButtonText: 'Jah',
		  denyButtonText: 'Ei',
		  }).then((result) => {
			  if (result.isConfirmed) {
				   $.ajax({
                    url: 'index.php?page=delete_row',
                    method: 'post',
					data: {table_name: tableName, id: ID},
                    success:function(response) {
						Swal.fire('Kustutatud!', '', 'success');
                    }
                });
				
			  } else if (result.isDenied) {
				Swal.fire('Rida ei kustutatud', '', 'info');
			  }
		});
	});
	
	new tempusDominus.TempusDominus(document.getElementById('kellaValik'),
	{
		localization: et
		
	});

	</script>
	
</body>
</html>
