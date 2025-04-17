<!DOCTYPE html>
<meta charset="utf8">
<link rel="icon" type="image/x-icon" href="./img/favicon.ico">
<?php
session_start();
require_once ('../kasjah.php');
if (!is_logged_in()) {
    echo $_SESSION['username']."sin";
  header('Location: ../index.php');
    exit();
}

?>
<form action="logout.php" method="post">
    <input type="submit" name="logout" value="Logout">
</form>

<?php
define('koolikell', true);
//print_r(session_status());
date_default_timezone_set('Europe/Tallinn'); 
require_once("con.php");
function puhasta($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
}

if(isset($_REQUEST['page'])){
if(!$_REQUEST['page']){
	$page="default";
} else {
	$page=$_REQUEST['page'];
	$page=puhasta($page);
}

}else {
	$page="default";}

?>
<?php require_once "header.php"; ?>
			
			<div class="col d-flex flex-column h-sm-100">
				<main class="row overflow-auto">
					<div class="col pt-4">
						<div class="card card-body">
					
					<?php
					
						 if(preg_match('/^[a-zA-Z0-9_]+$/', $page)) {
							 $location = './';
							 $fail = $location . $page . '.php';
							 if(file_exists($fail) && is_file($fail)) {
                      include $fail;
                     
                      } else {
						  include ("error.html");
						 
						  }
						 } else {
							 include("error.html");
						 }
						?>
						</div>
					</div>
				</main>
				<div class="container-fluid">
		

		</div>
	</div>
				<footer class="row bg-light py-4 mt-auto">
					<!--<div class="col"> Footer content here... </div> -->
				</footer>
			</div>
			
			
		</div>
	</div>
	
	
</body>
<?php
$mysqli->close();
?>
</html>
