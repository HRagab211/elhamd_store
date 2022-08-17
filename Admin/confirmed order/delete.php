<?php
if(isset($_GET["id"]))
{
try{
    $id = $_GET["id"];
    $c_id = $_GET["c"];
    $date=$_GET["d"];
    require_once("../../functions/functions.php");
    $con = connectDB();
    $sql = "DELETE FROM `orders` WHERE `orders`.`Order_ID` = $id and order_date ='$date'";
    $sql2 = "DELETE FROM product_orderd WHERE Customer_ID =$c_id AND date='$date'";    
    mysqli_query($con, $sql);
    mysqli_query($con, $sql2);
    header("location:./orderview.php");
}
catch(Exception $e)
{
    echo "<h3>You cannot Delete Confirmed order</h3>";
    echo"<a href='./orderview.php'>GO BACK</a>";    
}
}
else
{
    die(" <h1> Acess IS Denied </h1>");
}
?>
    