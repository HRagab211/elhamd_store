<?php
if(isset($_GET["id"]))
{$id=$_GET["id"];
    require_once("./functions.php");
    $con=connectDB();
    $sql="DELETE FROM `employees` WHERE `employees`.`employee_id` = $id";
    mysqli_query($con,$sql);
    header("location:./Employee.php");
}

else
{
    exit("Acess is denied")
;}
