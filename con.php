<?php 
$config = parse_ini_file('/var/connect/db.ini');
$mysqli = new mysqli($config['host'], $config['user'], $config['password'], $config['dbname']);

?>
