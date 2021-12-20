<?php  

	// Start the session
	session_start();

		// get email
		$url = 'http://localhost:8082/api/authorization/authorized_user';
		$ch = curl_init($url);
		$authToken = "Authorization: Bearer " . $_SESSION['token'];
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($authToken));
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$email = curl_exec($ch);
		
		curl_close($ch);


	$url = 'http://localhost:8762/api/add-review/add';

	// Create a new cURL resource
	$ch = curl_init($url);
	
	// Setup request to send json via POST
	$data = array(
	    'text' => $_POST["text"],
	    'author' => $email
	);

	$payload = json_encode($data);

	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

	// Attach encoded JSON string to the POST fields
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

	$authToken = "Authorization: Bearer " . $_SESSION['token'];
	
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array($authToken));
	
	// Set the content type to application/json
	curl_setopt(
		$ch,
		 CURLOPT_HTTPHEADER, array(
		 	$authToken,
			'Content-Type:application/json'
		)
	);
	
	// Return response instead of outputting
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	// Execute the POST request
	$result = curl_exec($ch);

	// Get response code
	//$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	// Close cURL resource
	curl_close($ch);

	ob_start();
	header("Location:profile.php?response=$result");
	ob_end_flush();
   	die();
?>
