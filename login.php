<?php

require "sql.php";

session_start();

$invalid=false; // Untuk mengecek apabila login yang dilakukan invalid atau tidak

if(isset($_POST["login"])) {
    $username=$_POST["username"];
    $password=$_POST["password"];
    $data=$conn->query("SELECT *  FROM login 
                        WHERE username='$username'
                        AND password='$password'");
    
    if($data->num_rows > 0) {
        $_SESSION["username"]=$username;
        header("Location: index.php");
    } else {
        $invalid=true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="assets/styles/login.css">
    </head>
    <body>
        <div id="form">
            <h1 class="text-center">Login</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        class="form-control"
                        autocomplete="off"
                        required
                    >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        required
                    >
                    <span id="visibility">
                        <svg id="eye" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </span>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>

        <script src="assets/scripts/seePassword.js"></script>
        <script src="assets/bootstrap/js/bootstrap.js"></script>
    </body>
</html>