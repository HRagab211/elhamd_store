<?php
if (isset($_POST["submit"]))
{
require_once("../functions/functions.php");
//variables

$name=clean($_POST["name"]);
$email=clean($_POST["email"]);
$subject=clean($_POST["subject"]);
$message=clean($_POST["message"]);
//validate error 
$errors=[];
array_push($errors,validate_text($name,"Your Name"));
array_push($errors,validate_email($email));
array_push($errors,validate_text($subject,"subject"));
array_push($errors,validate_text($message,"message"));
if (!check_error($errors))
{
session_start();
$_SESSION["errors"]=$errors;
header("location:../contact.php");
die;
}

$connection=connectDB("elhamd_contact");
@$sql="INSERT INTO `contact_form` (`name`, `email`, `subject`, `message`) VALUES ( '$name', '$email', '$subject', '$message')" or die("Message IS not sent");

if(!mysqli_query($connection,$sql))
{
    echo"error while inserting data";
    die;
}
header("location:../success.php");


}
else
{
header("location:../contact.php");
}