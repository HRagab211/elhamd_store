<?php
if(isset($_GET["c"]))
{
require_once("../../functions/functions.php");
$orderid=$_GET["c"];
$con=connectDB();
$sql="UPDATE `orders` SET `confirmed` = 'no' WHERE `orders`.`Order_ID` = $orderid";
mysqli_query($con,$sql);
header("location:./orderview.php");
}
else
{
    die("Acess Is denied");
}









?>