<?php 
@session_start();
if (isset($_GET['action']) && $_GET['action'] === "exit") {
	if (isset($_SESSION['AUTH_CODE_APPLICANT_ID'])) {
		$applicant_id = $_SESSION['AUTH_CODE_APPLICANT_ID'];
			@session_destroy();
			header("Location : ../");
			exit();
	}
}
 ?>