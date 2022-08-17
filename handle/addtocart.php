<?php

if(isset($_GET["id"]))
{
require_once("../functions/functions.php");
session_start();
$back=$_SERVER["HTTP_REFERER"];
if (isset($_SESSION["id"]))
{   $p_id=$_GET["id"];
    $c_id=$_SESSION["id"];
    $con=connectDB();
    $sql="INSERT INTO `cart` (`Customer_ID`, `Product_ID`) VALUES ('$c_id', '$p_id')";
    $res=mysqli_query($con,$sql);
    header("location:".$back);
    
}
else{
    header("location:../login/login.php");
    exit;

}

}
else
{
    exit("Access denied");
}