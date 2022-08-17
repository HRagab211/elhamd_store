<?php
if (isset($_POST["btn_clicked"]))
{
require_once("../../functions/functions.php");

$id=$_POST["id"];
$name=$_POST["productname"];
$price=$_POST["price"];
$category=$_POST["category"];
$con=connectDB();
$sql="UPDATE `product_list` SET `Product_Name` = '$name', `price` = '$price',`Category` = '$category' WHERE `product_list`.`Product_ID` = $id";
if($result=mysqli_query($con,$sql))
{
    header("location:./productlist.php");
}
}
else{
    die("access denied");
}