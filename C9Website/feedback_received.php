<!DOCTYPE html>
<html>
	<head>
		<title>Feedback Received</title>
		<meta charset="utf-8" />
	</head>
	<body>

<?php
	if(!(isset($_POST['name']) and isset($_POST['message']) and isset($_POST['email']))) {	// make sure all expected values were sent to the server, echo an error and exit if one is missing
		echo 'Form information not all submitted';
		exit(0);	// exit if not
	}
	
	$name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);			// filter out special html characters to avoid XSS
	$message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);					// do the same thing, but also remove characters which cannot be in an email address
	
	echo "<p>Name: $name</p>";				// with double quotes, variable names can just be put in the middle of the string without a concatenation operator (in most cases)
    echo "<p>Email: $email</p>";
	echo '<p>Message: '.$message.'</p>';	// string concatenation uses periods, unlike most languages, which use +
	
?>

	</body>
</html>