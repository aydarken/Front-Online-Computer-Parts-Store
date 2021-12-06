<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .form-registration {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
    </style>

</head>

<body class="text-center">

    <div class="form-registration">
        <form action="register.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Registration</h1>

            <?php if (isset($_GET['response'])) { ?>
                        <div class="alert alert-danger" role="alert"><?php echo $_GET['response'] ?></div>
            <?php } ?>  

            <div class="form-floating m-1">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating m-1">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <div class="form-floating m-1 ">
                <input type="password" name="passwordConfirm" class="form-control" id="passwordConfirm" placeholder="Confirm Password">
                <label for="passwordConfirm">Password Confirm</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary m-1" type="submit">Register</button>
        </form>
    </div>

</body>

</html>
