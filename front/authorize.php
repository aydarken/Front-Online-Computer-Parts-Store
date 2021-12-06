<?php  
	// Start the session
session_start();
	$url = 'http://localhost:8762/api/authorization/authorize';

	// Create a new cURL resource
	$ch = curl_init($url);
	
	// Setup request to send json via POST
	$data = array(
	    'email' => $_POST["email"],
	    'password' => $_POST["password"]
	);

	$payload = json_encode($data);

	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

	// Attach encoded JSON string to the POST fields
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	
	// Set the content type to application/json
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	
	// Return response instead of outputting
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	// Execute the POST request
	$result = curl_exec($ch);

	// Get response code
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	if ($httpcode >= 200 && $httpcode < 300) {

		// Save token in session
		$token = json_decode($result, true);
		$_SESSION['token'] = $token["jwt"];

		ob_start();
    	header('Location:catalog.php');
    	ob_end_flush();
    	die();
	} else {
		ob_start();
		header("Location:authorization.php?response=$result");
		ob_end_flush();
    	die();
	}

	// Close cURL resource
	curl_close($ch);
?>
