<?php
if(isset($_GET["id"]))
{$id=$_GET["id"];
    require_once("./functions.php");
    $con=connectDB();
    $sql="DELETE FROM `suppliers` WHERE `suppliers`.`Supplier_ID` = $id";
   mysqli_query($con,$sql);
    header("location:./supplier.php");
}

else
{
    exit("Acess is denied")
;}
