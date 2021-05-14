<?php

session_start();
if(isset($_SESSION['name'])){
    header("Location: main.php");
}

?>
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sign Up</title>
</head>
<body class="h-100 signup-page">

    <div class="container  h-100">
        <div class="row d-flex justify-content-center align-items-center  h-100">
            <div class="col-sm-12 col-md-5 p-3" style="background: #f5f5f5a6;">
                <form action="includes/signup.inc.php" method="POST">
                    <h2 class="text-center">Register</h2>
                    <p class="text-center alert-danger"><?php if( isset($_GET["error"]) ){echo $_GET["error"]; } ?></p>
                    <p class="text-center alert-danger">
                        <?php 
                        if( isset($_GET["msg"]) ){
                            echo $_GET["msg"]; 
                            header("refresh:2;url=login.php");
                        }
                         
                        ?>
                    </p>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" name="name" class="form-control form-control-sm" id="name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control form-control-sm" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" name="phone" class="form-control form-control-sm" id="phone" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control form-control-sm" id="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="c_password" class="form-control form-control-sm" id="c_password">
                    </div>
                    <!-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control form-control-sm" value="Register">
                    </div>   
                    <p class="text-center">Already have an account ? <a href="login.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>   
</body>
</html>