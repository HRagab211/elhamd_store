<?php
if (isset($_POST["btn_clicked"])) {
    require_once("../suppliers/functions.php");
    $id = $_POST["ID"];
    $name = clean($_POST["name"]);
    $quantity = clean($_POST["quantity"]);
    $price = clean($_POST["price"]);
    $supp = clean($_POST["from"]);
    $emp = clean($_POST["by"]);
    $con = connectDB();
    $sql= " UPDATE `inventory` SET `product Name` = '$name ', `Quantity` = '$quantity', `price` = '$price', `employee name` = '$emp', `supplier name` = '$supp' WHERE `inventory`.`ID` = $id";
    mysqli_query($con,$sql);
    header("location:./inventory.php");
} else {
    exit("Acess IS Denied");
}
