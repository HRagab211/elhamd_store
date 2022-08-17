<?php
if (isset($_GET["id"]))
{
try{require_once("../../functions/functions.php");
    $con=connectDB();
    $sql="DELETE FROM product_list WHERE product_list.Product_ID =". $_GET["id"];
    $result=mysqli_query($con,$sql);
    //-----------------------------------------------------------------------------------------//
    header("location:./productlist.php");}
    catch(Exception $e)
    {
        echo "This product in use in (confirmed order)";
        echo"<a href='./productlist.php'>GO BACK</a>";

    }
}
else {
    die("Access IS denied");

}