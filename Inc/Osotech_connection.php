<?php 
require_once 'initialize.php';
 	function Osotech_connection(){
 		$dbHost =__OSO_HOST__;
	$dbUser =__OSO_USER__;
	$dbPass =__OSO_PASS__;
	$dbCharset =__OSO_CHARSET__;
	$dbname =__OSO_DBNAME__;
	$dbDriver =__OSO_DB_DRIVER__;
	$dsn = $dbDriver.":host=".__OSO_HOST__.";dbname=".$dbname.";charset=".$dbCharset;
		$options = array(PDO::ATTR_PERSISTENT =>false,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ);
try {
		$dbh = new PDO($dsn,$dbUser,$dbPass,$options);
			
		} catch (PDOException $e) {
			$error = $e->getMessage();
			die ($error);
		}

		return $dbh;
 	}