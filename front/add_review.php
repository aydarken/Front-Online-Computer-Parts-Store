<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add review</title>

	    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="catalog.php">Online Computer Parts Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="reviews.php">Reviews</a>
        </li>
        <li class="dropdown d-flex">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            	$url = 'http://localhost:8082/api/authorization/authorized_user';
							$ch = curl_init($url);
							$authToken = "Authorization: Bearer " . $_SESSION['token'];
							curl_setopt($ch, CURLOPT_HTTPHEADER, array($authToken));
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			
							$result = curl_exec($ch);
			
							curl_close($ch);
			
							echo $result; 
						?>
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          	<li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="index.php">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
	<div class="row no-gutters">
		 <form action="review_add.php" method="POST">
		 	<div class="form-group text-center">
  			<label for="text" class="m-2">Review:</label>
  			<textarea class="form-control" rows="5" id="text" name="text"></textarea>
  			<label for="author" class="m-2">Author:</label>
  			<input type="text" name="author" id="author" value="<?php echo $result; ?>" disabled></input> <br>
				<button type="submit" class="btn btn-primary m-2">Add review</button>
			</div>
		 </form>
			

	</div>	
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>