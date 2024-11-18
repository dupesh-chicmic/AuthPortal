<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
</head>
<body class="bg-dark">
    <a href="<?php echo $_SERVER['HTTP_REFERER'] ?? "index.php"; ?>"><button class="btn btn-primary ms-4 mt-3">Go Back</button></a>
    <div class="container w-50 mt-5 border border-dark p-5 pt-3 rounded bg-light">
        <h1 class="text-center mt-2 mb-5">Login Form</h1>
        <form action="login.php" method="POST" class="mt-5" id="loginform">
            <div class="row mt-3">
                <div class="col">
                    <input type="email" name="email" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                <input type="submit" class="btn btn-primary w-100" name="login" value="login">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="d-flex justify-content-end mt-3">New User ?<a href="registerview.php">Register</a></p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>