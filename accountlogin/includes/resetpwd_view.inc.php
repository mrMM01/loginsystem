<?php

declare(strict_types=1);


function check_reset_errors() {

	if (isset($_SESSION["error_reset"])) {
		$errors = $_SESSION["error_reset"];

		echo '<script>alert("';  
		foreach ($errors as $error) {
			echo $error . '\n';
		}
		echo '")</script>';

		unset($_SESSION["error_reset"]);

	} else if (isset($_SESSION["new_password"])) {
		echo '<script>alert("Password has been reset. Here is your password: ' . $_SESSION["new_password"] .'")</script>'; 
		
		unset($_SESSION["new_password"]);
	}

}