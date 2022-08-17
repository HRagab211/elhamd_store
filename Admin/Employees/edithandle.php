<?php
if (isset($_POST["btn_clicked"])) {
    require_once("./functions.php");
    $id = $_POST["ID"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["Address"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $salary = $_POST["salary"];
    $con = connectDB();
    $sql= "UPDATE `employees` SET `Name` = '$name', `Address` = '$address', `phone_Number` = '$phone', `E_mail` = '$email', `role` = '$role', `salary` = '$salary' WHERE `employees`.`employee_id` = $id    ";
    mysqli_query($con,$sql);
    header("location:./Employee.php");
} else {
    exit("Acess IS Denied");
}
