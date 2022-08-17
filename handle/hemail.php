<?php
if (isset($_GET["submit"]))
{
    require_once("../functions/functions.php");
$email=clean($_GET["email"]);
$errors=[];
array_push($errors,validate_email($email));
if (!check_error($errors))
{
session_start();
$_SESSION["errors"]=$errors;
header("location:../index.php");
die;
}


$connection=connectDB();
$sql="INSERT INTO `email_for_contact` (`email_for_contact`) VALUES ('$email')";

if(!mysqli_query($connection,$sql))
{
    echo"error while inserting data";
    die;
}
header("location:../index.php");





}
else
{
    header("location:../index.php");
}