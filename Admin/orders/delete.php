<?php
if(isset($_GET["id"]))
{
    
    $id = $_GET["id"];
    $c_id = $_GET["c"];
    $date= $_GET["d"];
    require_once("../../functions/functions.php");
    $con = connectDB();
    $sql2 = "DELETE FROM product_orderd WHERE Order_ID=$id ";
    $sql = "DELETE FROM `orders` WHERE `orders`.`Order_ID` = $id and order_date ='$date'";
    mysqli_query($con, $sql2);
    mysqli_query($con, $sql);
    header("location:./orderview.php");
}
else
{
    die(" <h1> Acess IS Denied </h1>");
}