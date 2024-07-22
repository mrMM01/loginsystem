<?php

declare(strict_types=1);

function register_inputs() {

	if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["error_signup"]["username_taken"])) {
		echo '<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" value="' . $_SESSION["signup_data"]["username"] . '">
        </div>';
	} else {
		echo '<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username">
        </div>';
	}

	echo '<div class="form-group">
		<label for="password">Password</label>
        <input type="password" class="form-control" name="pwd">
    </div>';

	if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["email_used"]) && !isset($_SESSION["error_signup"]["invalid_email"])) {
		echo '<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" value="' . $_SESSION["signup_data"]["email"] . '">
        </div>';
	} else {
		echo '<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email">
        </div>';
	}
}

function check_register_errors() {

	if (isset($_SESSION["error_signup"])) {
		$errors = $_SESSION["error_signup"];

		echo '<script>alert("';  
		foreach ($errors as $error) {
			echo $error . '\n';
		}
		echo '")</script>';

		unset($_SESSION["error_signup"]);

	} else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
		
		echo '<script>alert("Signup success!")</script>'; 

		unset($_SESSION["signup_data"]);
	}
}