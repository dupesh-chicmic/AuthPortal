<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <a href="<?php echo $_SERVER['HTTP_REFERER'] ?? "index.php"; ?>"><button class="btn btn-primary ms-4 mt-3">Go Back</button></a>
    <div class="container border bg-light rounded w-50 mt-5">
        <h1 class="text-center mt-4">Registration Form:</h1>
        <form action="../controller/register.php" method="POST" enctype="multipart/form-data" id="form" class="p-4 m-auto mt-3">
            <div class="row">
                <div class="col">
                    <label class="mt-2">Upload File:</label><input type="file" name="files[]" multiple class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="mt-2">Username: </label><input type="text" name="username" placeholder="Enter Username" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="mt-2">Email: </label><input type="email" name="email" placeholder="Enter Email" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="mt-2">phone: </label><input type="tel" name="phone" placeholder="Enter Phone" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="mt-2">Password: </label><input type="password" name="password" placeholder="Enter Password" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="mt-2">Confirm Password: </label><input type="password" name="confirmpassword" placeholder="Re-enter Password" class="form-control">
                </div>
            </div> 
            <div class="row">
                <div class="col">
                    <input type="submit" value="Register" class="form-control mt-4 btn btn-primary" name="register" >
                </div>
            </div> 
            <div class="row">
                <div class="col">
                    <p class="d-flex justify-content-end mt-3">Already a User ?<a href="loginview.php">Login</a></p>
                </div>
            </div>
        </form>
    </div>
    <script src = "../js/registervalidate.js"></script>
</body>
</html>