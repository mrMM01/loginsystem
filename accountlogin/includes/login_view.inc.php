<?php

declare(strict_types=1);

function output_username() {

	if (isset($_SESSION["user_id"])){
		echo "You are logged in as " . $_SESSION["user_username"];
	} else {
		echo "You are not logged in.";
	}

}

function check_login_errors() {

	if (isset($_SESSION["errors_login"])) {
		$errors = $_SESSION["errors_login"];

		echo '<script>alert("';  
		foreach ($errors as $error) {
			echo $error . '\n';
		}
		echo '")</script>';

		unset($_SESSION["errors_login"]);
	} 

}