<?php

session_start();

if(!isset($_SESSION['name'])){
    header("Location: login.php");
}

include_once("includes/db.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Main</title>
</head>
<body>
    <nav class="navbar  navbar-light bg-secondary">
        <a class="navbar-brand text-white">Attic Infomatics</a>
        <a href="logout.php" class="form-inline btn btn-outline-light my-2 my-sm-0" type="submit">Log Out</a>
    </nav>

    <div class="jumbotron jumbotron-fluid m-3">
        <div class="container">
            <?php

            $sql = "SELECT * FROM users WHERE  email='".$_SESSION["name"]."';";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $name = $row["name"];
                    $email = $row["email"]; 
                    $phone = $row["phone"]; 
                }
              } 

            ?>
            <h1 class="display-4"><?php echo $name; ?></h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            <p><b>Email: </b><?php echo $email; ?></p>
            <p><b>Mobile: </b><?php echo $phone; ?></p>

        </div>
    </div>
</body>
</html>