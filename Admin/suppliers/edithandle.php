<?php
if (isset($_POST["btn_clicked"])) {
    require_once("./functions.php");
    $id = $_POST["ID"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["Address"];
    $con = connectDB();
    $sql= " UPDATE `suppliers` SET `Phone` = '$phone', `Name` = '$name', `shop_address` = '$address' WHERE `suppliers`.`Supplier_ID` = $id";
    mysqli_query($con,$sql);
    header("location:./supplier.php");
} else {
    exit("Acess IS Denied");
}
