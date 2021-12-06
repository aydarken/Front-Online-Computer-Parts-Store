<?php  
	// Start the session
	session_start();


	$url = 'http://localhost:8762/api/refund/' . $_GET['id'];

	$ch = curl_init($url);
	$authToken = "Authorization: Bearer " . $_SESSION['token'];

	curl_setopt($ch, CURLOPT_HTTPHEADER, array($authToken));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($ch);

	curl_close($ch);

	ob_start();
	header("Location:orders.php?response=$result");
	ob_end_flush();
    die();


?>
