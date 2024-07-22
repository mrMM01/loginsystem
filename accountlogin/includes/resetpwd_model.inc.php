<?php

declare(strict_types=1);


function get_email(object $pdo, string $email) {

	$query = "SELECT email FROM users WHERE email = :email";
	$stmt = $pdo->prepare($query);
	$stmt->bindParam(":email", $email);
	$stmt->execute();

	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	return $result;

}

function set_password(object $pdo, string $email, string $newpwd) {

	$query = "UPDATE users SET pwd = :pwd WHERE email = :email";
	$stmt = $pdo->prepare($query);

	$option = [
		'cost' => 12
	];
	
	$hashedPwd = password_hash($newpwd, PASSWORD_BCRYPT, $option);

	$stmt->bindParam(":pwd", $hashedPwd);
	$stmt->bindParam(":email", $email);
	$stmt->execute();

}