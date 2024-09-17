<?php

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
    
}
require_once '../kasjah.php';
if (!is_logged_in()) {
   header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Koolikell</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/main.css">
	<link href="./css/datatables.min.css" rel="stylesheet">
	<link href="./css/material-components-web.min.css" rel="stylesheet">
	<link href="./css/dataTables.material.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.9.4/dist/css/tempus-dominus.min.css" crossorigin="anonymous">
		
	<?php require_once "footer.php"; ?>
	
	<style>
		input[type=date]{
     border-radius: 10px;
     border: 1px solid blue;
     color: black;
     width: 150px;
     height: 30px;
     padding-left: 10px;
     padding-right:10px;
    }
 input[type=time]{
     border-radius: 10px;
     border: 1px solid blue;
     color: black;
     width: 150px;
     height: 30px;
     padding-left: 10px;
     padding-right:10px;
    }
input[type=text]{
	border-radius: 10px;
     border: 1px solid blue;
     color: black;
     width: 250px;
     height: 30px;
     padding-left: 10px;
     padding-right:10px;
		}
.yleval{
	position:sticky;
	top:8px;
	}
		</style>
</head>
<body>
	
	<div class="container-fluid overflow-hidden ">
		<div class="row vh-100 overflow-auto">
			<div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 sidebar-bg d-flex sticky-top">
				<div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
				<div class="yleval">
					<a href="/" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none sidebar-title">
						<span>VPG Koolikell</span>
					</a>
					<ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
						<li class="nav-item">
							<a href="?" class="nav-link px-sm-0 px-2">
								<i class="fa-solid fa-house"></i><span class="ms-1 d-none d-sm-inline">Esileht</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fa-solid fa-calendar"></i><span class="ms-1 d-none d-sm-inline">Kellaaegade tabelid</span>
							</a>
							<ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
								<?php
								$query = "SHOW TABLES LIKE 'KP_%'";
								$result = $mysqli->query($query);
																if ($result->num_rows > 0) {
									while ($row = $result->fetch_row()) {
										$nimi=substr($row[0],3);
									  echo '<li><a class="dropdown-item" href="?page=kellad&table_name='.$nimi.'">'.$nimi.'</a></li>';
									   
									}
								}else { echo "halb"; }

								?>
							</ul>
						</li>
						<li>
							<a href="?page=puhkepaevad" class="nav-link px-sm-0 px-2">
								<i class="fa-solid fa-calendar-days"></i><span class="ms-1 d-none d-sm-inline">Puhkepäevad</span></a>
						</li>
						<li>
							<a href="?page=kuupaevad" class="nav-link px-sm-0 px-2">
								<i class="fa-solid fa-calendar-days"></i><span class="ms-1 d-none d-sm-inline">Eri kuupäevad</span></a>
						</li>
						<li>
							<a href="?page=satted" class="nav-link px-sm-0 px-2">
								<i class="fa-solid fa-gear"></i></i><span class="ms-1 d-none d-sm-inline">Sätted</span> </a>
						</li>
					</ul>
				</div>
			</div>
</div>
