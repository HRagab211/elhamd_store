<?php
if (isset($_POST["btn_clicked"])) {
    require_once("./functions.php");
    $name = clean($_POST["name"]);
    $number = clean($_POST["number"]);
    $address = clean($_POST["Address"]);

    $con = connectDB();

    $sql = "INSERT INTO `suppliers` (`Phone`, `Name`, `shop_address`) VALUES ('$number', '$name', '$address')";
    mysqli_query($con,$sql);
    header("location:./supplier.php");
} else {
    exit("access Denied");
}
