<?php
require_once "../functions/functions.php";
session_start();

if(isset($_POST["clicked_btn"])){
     $email = clean($_POST["email"]);
     $password = clean($_POST["pass"]);
$errors=[];
     array_push($errors,validate_email($email));
     array_push($errors,validate_pass($password));
    
     if(!check_error($errors)){
        $_SESSION["error"] = $errors;
        header("location:../login/login.php");
        
     }else{
        $con = connectDB();
        $command = "SELECT * FROM customers WHERE E_mail = '$email' AND pass = '$password'";
        $result = mysqli_query($con,$command);
        $x=mysqli_fetch_assoc($result);
        $id=$x["Customer_ID"];
        if(mysqli_num_rows($result) == 0){
            $_SESSION["error"]=["Email or password is incorrect"];
            header("location:../login/login.php");
        } else{
            $_SESSION["id"]="$id";
            header("location:../index.php");
        }   
        
        mysqli_close($con);
     }

}else{
    header("location:../login/login.php");
}