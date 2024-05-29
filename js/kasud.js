new DataTable('#kellaajadP', {
			paging: false,
			responsive: true,
			language: {
				url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/et.json',
			},
		});
$(".deleteTimeBtn").click(function(e) {
		e.preventDefault();
		console.log("a");
		tableName = $('.deleteTimeBtn').attr('table_name');
		ID = $('.deleteTimeBtn').attr('id');
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
                    url: 'delete_row.php',
                    method: 'post',
					data: {table_name: tableName, id: ID},
                    success:function(response) {
						console.log(response);
						Swal.fire({
						  title: "Kustutatud!",
						  text: "Rida on kustutatud.",
						  icon: "success"
						}).then(function() {
							location.reload();
						});
                    }
                });
				
			  } else if (result.isDenied) {
				Swal.fire('Rida ei kustutatud', '', 'info');
			  }
		});
	});

$(".LisaKuupaev").click(function(e) {
		e.preventDefault();
		$.ajax({
			url: 'insert_rowPuh.php',
			method: 'post',
			data: $("#LisaKuup").serialize(),
			success:function(response) {
				console.log(response);
				Swal.fire({
				  title: "Salvestatud!",
				  text: "Teie tehtud muudatused on salvestatud.",
				  icon: "success"
				}).then(function() {
					window.location = "index.php?leht=kuupaevad";
				});
			}
		});
		
	});
