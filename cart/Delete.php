<?php
if(isset($_GET["id"]))
{
    $back=$_SERVER["HTTP_REFERER"];
    require_once("../functions/functions.php");
    session_start();
    $p_id=$_GET["id"];
    $c_id=$_SESSION["id"];
    // echo $c_id;
    // echo $p_id;
    $con=connectDB();
    $sql="SELECT cart_id FROM `cart` WHERE Customer_ID=$c_id AND Product_ID=$p_id";
    $result=mysqli_query($con,$sql);
    $cartid=mysqli_fetch_assoc($result);
    $sqltow="DELETE FROM cart WHERE `cart`.`cart_id`=".$cartid["cart_id"];
    $resulttow=mysqli_query($con,$sqltow);
    header("location:".$back);
}
else
{exit("Access Denied");}