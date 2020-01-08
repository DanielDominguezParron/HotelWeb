<?php

	session_start();

	if(isset($_SESSION["nombre"])){

		session_unset();
		session_destroy();
		
		header("Location: index.php?error=logout");
		
	}else{
		
		header("Location: index.php?error=notSession");
		
	}
?>