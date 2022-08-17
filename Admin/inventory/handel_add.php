<?php
if (isset($_POST["btn_clicked"])) {
    require_once("../suppliers/functions.php");
    $name = clean($_POST["name"]);
    $quantity = clean($_POST["quantity"]);
    $price = clean($_POST["price"]);
    $supp = clean($_POST["from"]);
    $emp = clean($_POST["by"]);
    $date = clean($_POST["date"]);
    $con = connectDB();

    $sql = "INSERT INTO `inventory` (`product Name`, `Quantity`, `price`, `employee name`, `supplier name`, `date`) VALUES ('$name', '$quantity', '$price', '$emp', '$supp', '$date')";
    mysqli_query($con,$sql);
    header("location:./inventory.php");
} else {
    exit("access Denied");
}
