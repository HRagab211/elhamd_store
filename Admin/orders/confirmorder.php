<?php
if(isset($_GET["c"]))
{
    session_start();
    require_once("../../functions/functions.php");
    $products=$_SESSION["products"];
    $con=connectDB();
    //----------------------------------
    //Order product name
    $prod=[];
    
    foreach($products as $key)
    {
        $inv="SELECT * FROM `product_list` WHERE Product_ID = $key ";
        $res=mysqli_query($con,$inv);
        while($row=mysqli_fetch_assoc($res))
        {
            $code=$row["Product_code"];
            $name=query($con,"SELECT `product Name` FROM `inventory` WHERE id = $code");
            $pname=$name["0"];
            array_push($prod,$pname);
        }
    }

    //----------------------------------
    //suptracting from inv
    foreach($prod as $value)
    {
        $sql4="SELECT `Quantity`,`ID` FROM inventory WHERE `product Name`='$value'";
        $quantity=mysqli_fetch_assoc(mysqli_query($con,$sql4));
        $sub=($quantity["Quantity"])-1;
        $ID=$quantity["ID"];
        $up="UPDATE `inventory` SET `Quantity` = '$sub' WHERE `inventory`.`ID` = $ID";
        mysqli_query($con,$up);
    }
    //--------------------  
    $orderid=$_GET["c"];
    $sql="UPDATE `orders` SET `confirmed` = 'yes' WHERE `orders`.`Order_ID` = $orderid";
    mysqli_query($con,$sql);
    unset($_SESSION["products"]);
header("location:./orderview.php");
}
else
{
    die("Acess Is denied");
}









?>