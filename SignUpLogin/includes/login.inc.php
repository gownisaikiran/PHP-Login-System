<?php

if( !isset($_SERVER["HTTP_REFERER"]) ){
    die("Access Not Allowed");
}
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

if( $email!="" && $password!="")
{
    
    include_once("db.inc.php");
    $sql ="SELECT * from users WHERE email='$email' AND password='$password';";
    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['name'] = $email;
        if( isset($_POST['remember']) ){
            setcookie('email', $email, time()+60, '/');
            setcookie('password', $password, time()+60, '/');
        }
        header("Location: ../login.php?msg=Logged In. Please wait...");
    }
    else{
            header("Location: ../login.php?error=Invalid Credentials");
    }

} 
else{

    header("Location: ../login.php?error=Please Fill the all Details");
}


?>