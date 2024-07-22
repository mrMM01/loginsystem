<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	
	$email = $_POST["email"];

	try {
		require_once 'dbh.inc.php';
		require_once 'resetpwd_model.inc.php';
		require_once 'resetpwd_contr.inc.php';

		//ERROR HANDLERS
		$errors = [];

		if (is_input_empty($email)) {
			$errors["empty_input"] = "Fill all the fields!";
		}
		/*if (is_email_invalid($email)) {
			$errors["invalid_email"] = "Please input a valid email!";
		}*/
        if (!is_email_registered($pdo, $email)) {
			$errors["email_unregister"] = "Email is not registered!";
		}

		require_once 'config_session.inc.php';

		if ($errors) {
			$_SESSION["error_reset"] = $errors;

			header("Location: ../reset_password.php");
			die();
		}
        
        //generate new password
        $newpwd = generate_random_password();
        set_password($pdo, $email, $newpwd);
        //send_email($email, $newpwd); I can't make it work haha
        $_SESSION["new_password"] = $newpwd;
		header("Location: ../reset_password.php");
        
	} catch (PDOException $e) {
		die ("Query failed: " . $e->getMessage());
	}
} else {
	header("Location: ../reset_password.php");
	die();
}

/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generate a new random password
    $new_password = generateRandomPassword(); // Define this function below

    // Hash the new password before storing it (if you store passwords hashed)
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the user's password in the database (replace with your own query)
    $stmt = $conn->prepare("UPDATE users SET password = :password WHERE email = :email");
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        // Password updated successfully, now send an email with the new password
        $subject = 'Password Reset';
        $message = 'Your new password is: ' . $new_password;
        $headers = 'From: your-email@example.com' . "\r\n" .
            'Reply-To: your-email@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($email, $subject, $message, $headers)) {
            echo 'A new password has been sent to your email.';
        } else {
            echo 'Failed to send email. Please contact support.';
        }
    } else {
        echo 'Failed to update password. Please try again later.';
    }
}

// Function to generate a random password
function generateRandomPassword($length = 10) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;

}
?>*/