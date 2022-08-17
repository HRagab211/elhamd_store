<?php
require("../../functions/functions.php");
if (isset($_POST["add"]))
{
 $productcode=clean($_POST["productname"]);
 $prdouctprice=clean($_POST["prdouctprice"]);
 $category=clean($_POST["category"]);
 //image ------------------
$image=$_FILES["Image"];
$image_name = $image["name"];
$image_size = $image["size"];
$image_type = $image["type"];
$image_temp = $image["tmp_name"];
$image_error = $image["error"];
$image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
$image_new_name = uniqid().".$image_ext";

move_uploaded_file($image_temp,"../uploads/".$image_new_name);

$errors=[];
array_push($errors,validate_text($productcode,"product Name"));
array_push($errors,validate_text($prdouctprice,"product Price"));
array_push($errors,validate_text($prdouctprice,"product Price"));
array_push($errors,imagevalidate($image_ext,$image_size));
if(!check_error($errors))
{
    session_start();
    $_SESSION["errors"]=$errors;
    header("location:../addproduct.php");
    die;
}
$connection=connectDB();
$sql="INSERT INTO `product_list` (`Product_code`, `price`, `Image`, `Category`) VALUES ( '$productcode', '$prdouctprice', '$image_new_name', '$category')";
$result=mysqli_query($connection,$sql);
header("location:./success2.php");
}
else
{
    header("location:../login.php");
}