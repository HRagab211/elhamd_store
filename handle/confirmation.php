<?php
if (isset($_POST["submit"]))
{
session_start();
unset($_SESSION["success"]);
require_once("../functions/functions.php");
    //---------------------------------------------//
    // inputs
    $name=      clean($_POST["Name"]);
    $phone=    clean($_POST["phone"]);
    $email=    clean($_POST["email"]);
    $city=      clean($_POST["city"]);
    $zip=        clean($_POST["zip"]);
    $address=clean($_POST["address"]);
//----------------------------------------------//
//handling error
// $errors=[];
// array_push($errors,validate_username($name));
// array_push($errors,validate_email($email));
// array_push($errors,validate_text($address,"Your Address"));
// if(strlen($zip)!==5)
// {
//     array_push($errors,"ZIP is not valid");
// }
// if(!check_error($errors))
// {
//     $_SESSION["errors"]=$errors;
//     header("location:../cart/confirm.php");
//     exit;
// }
//--------------------------------------------------------------
//Inserting data to order table
$con=connectDB();
$unique=random_int(10,10000);
echo $unique;
$test=query($con,"SELECT Order_ID FROM `orders` WHERE Order_ID =$unique");
if(count($test)>0)
{
    $unique=random_int(10,1000000);
}

$c_id=$_SESSION["id"];
$sql="INSERT INTO `orders` (`Order_ID`,`Name`, `order_destination`, `phone`, `Customer_ID`, `contact_email`, `ciity`, `zip_code`) VALUES ('$unique','$name','$address', '$phone', '$c_id', '$email', '$city', '$zip')";
mysqli_query($con,$sql);
//----------------------------------------------------------//
//Products are in the cart
$command = "SELECT * FROM `cart` WHERE Customer_ID ='$c_id'";
@$result = mysqli_query($con,$command)or die("Error Occuerd in cart");
$products=[];
while($row = mysqli_fetch_assoc($result)){
    array_push($products,$row["Product_ID"]);

}

//---------------------------------------------------------------//
//adding product to data base orderd
foreach($products as $key)
{

$sq="INSERT INTO `product_orderd` (`Customer_ID`,`Order_ID`, `Product_ID`) VALUES ('$c_id', '$unique', '$key')";
$res=mysqli_query($con,$sq);
}
//-----------------------------------------------------------//
// Setting cart Empty
$select = "SELECT cart_id FROM `cart` WHERE Customer_ID=$c_id";
$selectresult = mysqli_query($con, $select);
$cart = [];
while ($row = mysqli_fetch_assoc($selectresult)) {
    array_push($cart, $row["cart_id"]);
}
if (count($cart) > 0) {
    foreach ($cart as $key) {
        $delete = "DELETE FROM cart WHERE `cart`.`cart_id` = $key" ;
        @ mysqli_query($con, $delete) or die("Error Occuerd in cart");
    }
}
//-----------------------------------------------------------//
header("location:../cart/suc.php");
}
else
{
    die("<h1>Access IS Denied</h1>");
}