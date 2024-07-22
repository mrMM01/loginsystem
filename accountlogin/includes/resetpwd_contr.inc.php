<?php

declare(strict_types=1);


function is_input_empty(string $email) {

	if (empty($email)) {
		return true;
	} else {
		return false;
	}

}

/*function is_email_invalid(string $email) {

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}

}*/

function is_email_registered(object $pdo, string $email) {

	if (get_email($pdo, $email)) {
		return true;
	} else {
		return false;
	}

}

function generate_random_password($length = 6) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;

}

function send_email(string $email, string $newpwd) {

	/*$subject = 'Password Reset';
    $message = 'Your new password is: ' . $newpwd;
    $headers = 'From: micomontoya90@gmail.com' . "\r\n" .
            'Reply-To: '. $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    mail($email, $subject, $message, $headers);*/
    
	$to = $email;
	$subject = 'Password Reset';
	$message = 'Your new password is: ' . $newpwd;
	$headers = 'From: micomontoya90@gmail.com';

	mail($to, $subject, $message, $headers);

}