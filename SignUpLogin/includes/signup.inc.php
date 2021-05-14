<?php

if( !isset($_SERVER["HTTP_REFERER"]) ){
    die("Access Not Allowed");
}

session_start();

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$c_password = $_POST["c_password"];

if( $name!="" && $email!="" && $phone!="" && $password!="" && $c_password!="" )
{
    if($password!=$c_password)
    {
        header("Location: ../index.php?error=Password didn't Match");
    }
    include_once("db.inc.php");
    $sql ="SELECT email from users WHERE email='$email';";
    // echo $sql;
    // exit();
    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        header("Location: ../index.php?error=Email ID Already Registered");
    }
    else{
        $sql ="INSERT INTO users (name,email,phone,password) VALUES('$name','$email','$phone','$password');";
        // echo $sql;
        // exit();
        $result = mysqli_query($conn,$sql); 
        if($result){
            $_SESSION['name'] = $email;
            header("Location: ../index.php?msg=Account Created Sucessfully. Please wait...");
        }else{
            header("Location: ../index.php?error=Something Went Wrong!");
        }
    }

} 
else{
    header("Location: ../index.php?error=Please Fill the all Details");
}


?>