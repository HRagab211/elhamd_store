<?php
if(isset($_GET["id"]))
{$id=$_GET["id"];
    require_once("../suppliers/functions.php");
    $con=connectDB();
    $sql="DELETE FROM `inventory` WHERE `inventory`.`ID` = $id";
   mysqli_query($con,$sql);
    header("location:./inventory.php");
}

else
{
    exit("Acess is denied")
;}
