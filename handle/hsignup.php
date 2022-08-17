<?php
require_once "../functions/functions.php";
session_start();
if(isset($_POST["clicked_btn"])){
        $user=clean($_POST["user"]);
        $email = clean($_POST["email"]);
        $password = clean($_POST["pass"]);
        $errors=[];
        $con = connectDB();
                        $commandone="SELECT E_mail FROM `customers` WHERE E_mail='$email'";
                        $resultone = mysqli_query($con,$commandone);
                        if(mysqli_num_rows($resultone)>0)
                         {
                             array_push($errors,"email is duplicated");
                         }
                         array_push($errors,validate_email($email));
                         array_push($errors,validate_username($user));
                         array_push($errors,validate_pass($password));
                    if(!check_error($errors)){
                        $_SESSION["error"] = $errors;
                        header("location:../signup.php");
                    }
                        
                         
$command = "INSERT INTO `customers` (`Name`, `E_mail`, `pass`) VALUES ('$user', '$email', '$password')";
 mysqli_query($con,$command);
            if(!mysqli_query($con,$command)){
                $_SESSION["error"] = ["Data can not inserted"];
                header("location:../signup.php");
            } else{
                header("location:../login/login.php");

            }
        
}else{
    header("location:./signup.php");
}