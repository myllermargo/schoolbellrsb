<meta charset="utf8">

<form action="logout.php" method="post">
    <input type="submit" name="logout" value="Logout">
</form>

<?php
define('koolikell', true);

date_default_timezone_set('Europe/Tallinn'); 
require_once("con.php");
function puhasta($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
}
if(isset($_REQUEST['leht'])){
if(!$_REQUEST['leht']){
	$leht="default";
} else {
	$leht=$_REQUEST['leht'];
	$leht=puhasta($leht);
}

}else {
	$leht="default";}

?>
<?php require_once "header.php"; ?>
			
			<div class="col d-flex flex-column h-sm-100">
				<main class="row overflow-auto">
					<div class="col pt-4">
						<div class="card card-body">
					
					<?php
					
						 if(preg_match('/^[a-zA-Z0-9_]+$/', $leht)) {
							 $asukoht = './';
							 $fail = $asukoht . $leht . '.php';
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
