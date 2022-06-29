<?php 
if ($Osotech->check_portal_status()) {
	 header("Location: maintenance");
      exit();
}

 ?>