<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Computer Parts Shop</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    <div class="d-flex flex-column min-vh-100 text-center align-items-center">

        <h1 class="m-2">Online Computer Parts Shop</h1>
        <p>Please register or authorize in order to continue</p>

        <button type="button" class="btn btn-primary m-1">
            <a href="registration.php" class="link-light" style="text-decoration: none">Registration</a>
        </button>

        <button type="button" class="btn btn-primary m-1">
            <a href="authorization.php" class="link-light" style="text-decoration: none">Authorization</a>
        </button>

    </div>
</body>
</html>
