<?php  
	// Start the session
	session_start();


	$url = 'http://localhost:8082/api/authorization/authorized_user';
	$ch = curl_init($url);
	$authToken = "Authorization: Bearer " . $_SESSION['token'];

	curl_setopt($ch, CURLOPT_HTTPHEADER, array($authToken));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$email = curl_exec($ch);

	curl_close($ch);

	
	$id = ($_GET['response']);

	$url = 'http://localhost:8762/api/checkout/' . $email . '/' . $_GET['id'] . '/' . $_SESSION['token'];

	// Create a new cURL resource
	$ch = curl_init($url);
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, array($authToken));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	// Execute the POST request
	$result = curl_exec($ch);

	// Get response code
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	// Close cURL resource
	curl_close($ch);

	ob_start();
	header("Location:catalog.php?response=$result");
	ob_end_flush();
    die();


?>
