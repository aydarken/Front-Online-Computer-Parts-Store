<?php  

	$url = 'http://localhost:8762/api/registration/register';

	// Create a new cURL resource
	$ch = curl_init($url);
	
	// Setup request to send json via POST
	$data = array(
	    'email' => $_POST["email"],
	    'password' => $_POST["password"],
	    'passwordConfirm' => $_POST["passwordConfirm"]
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

	// Close cURL resource
	curl_close($ch);

	if ($httpcode >= 200 && $httpcode < 300) {
		ob_start();
		header("Location:authorization.php");
		ob_end_flush();
    	die();
	}
	else { // redirect to registration page with error message
		ob_start();
		header("Location:registration.php?response=$result");
		ob_end_flush();
    	die();
	}

	// function proceedToAuth($email, $password) {
		
	// 	// where are we posting to?
	// 	$url = '../authorize.php';
		
	// 	// what post fields?
	// 	$fields = array(
	// 	   'email' => $email,
	// 	   'password' => $password
	// 	);
	
	// 	// build the urlencoded data
	// 	$postvars = http_build_query($fields);
		
	// 	// open connection
	// 	$ch = curl_init();
		
	// 	// set the url, number of POST vars, POST data
	// 	curl_setopt($ch, CURLOPT_URL, $url);

	// 	//curl_setopt($ch,CURLOPT_POST, true);
	// 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	// 	curl_setopt($ch, CURLOPT_POST, count($fields));
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
	// 	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

	// 	echo $postvars;
		
	// 	// execute post
	// 	$result = curl_exec($ch);

	// 	echo $result;
		
	// 	// close connection
	// 	curl_close($ch);
	// }
?>
