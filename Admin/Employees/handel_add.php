<?php
if (isset($_POST["btn_clicked"])) {
    require_once("./functions.php");
    $name = clean($_POST["name"]);
    $number = clean($_POST["number"]);
    $address = clean($_POST["Address"]);
    $email = clean($_POST["Email"]);
    $role = clean($_POST["role"]);
    $salary = clean($_POST["salary"]);

    $con = connectDB();

    $sql = "INSERT INTO `employees` (`Name`, `Address`, `phone_Number`, `E_mail`, `role`, `salary`, `date`) VALUES ('$name', '$address', '$number', '$email', '$role', '$salary', current_timestamp())";
    mysqli_query($con,$sql);
    header("location:./Employee.php");
} else {
    exit("access Denied");
}
