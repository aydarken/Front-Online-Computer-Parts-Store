<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Catalog</title>

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
          <a class="nav-link active" aria-current="page" href="orders.php">Orders</a>
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
			
							$email = curl_exec($ch);
			
							curl_close($ch);
			
							echo $email;
            ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="index.php">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container">

		<?php if (isset($_GET['response'])) { ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_GET['response'] ?></div>
      <?php } ?> 

		<?php 

			$url = 'http://localhost:8762/api/user-orders/all/' . $email;
			$ch = curl_init($url);
			$authToken = "Authorization: Bearer " . $_SESSION['token'];
			curl_setopt($ch, CURLOPT_HTTPHEADER, array($authToken));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$result = curl_exec($ch);

			curl_close($ch);

			$catalog_items = json_decode($result, true); ?>

			<table class="table">
				<thead>
				  <tr>
				    <th scope="col">#</th>
				    <th scope="col">Name</th>
				    <th scope="col">ItemId</th>
				    <th scope="col">Refund</th>
				  </tr>
				</thead>

				<tbody>
					<?php
					$i = 1;
					foreach ($catalog_items as $item) { ?>
					
					<tr>
					    <th scope="row"><?php echo $i; ?></th>
					    <td><?php echo $item['email']; ?></td>
					    <td><?php echo $item['itemId']; ?></td>
					    <td>
							<a href="refund.php?id=<?php echo $item['id']; ?>" class="btn btn-danger">Refund</a>		
					    </td>
					  </tr>
	
					<?php $i++; } // end of for loop ?>
				</tbody>
			</table>

</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>
