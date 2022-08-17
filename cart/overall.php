<?php
session_start();
if(isset($_SESSION["success"]))
{
require_once "../functions/functions.php";
$c_id=$_SESSION["id"];
$con = connectDB();
$command = "SELECT * FROM `cart` WHERE Customer_ID ='$c_id'";
$result = mysqli_query($con,$command);
$products=[];
while($row = mysqli_fetch_assoc($result)){
    array_push($products,$row["Product_ID"]);

}
$sql="SELECT DISTINCT * FROM orders,customers WHERE orders.Customer_ID=$c_id AND customers.Customer_ID=$c_id";
$resultow=mysqli_query($con,$sql);
$all=mysqli_fetch_assoc($resultow);
}
else{
    exit("Access IS Denied");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed</title>
    <link rel="stylesheet" href="../css/ovaerall.css">
    <STyle>
    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    P {
        color: green
    }

    body {
        background-image: url('../images/overall.jpg');
    }
    </STyle>
</head>

<body>
    <div class="head">
        <h2>EL-HAMD COMPANY</h2>
        <h1>
                <p>info about products you have orderd and total price now YOU can confirm your order </p>
        </h1>
    </div>
    <div>
        <a href="./confirm.php" class="button">Confirm order</a>
        <a  class="button" onclick=window.print()>Print</a>

    </div>
    <div id="big">
        <div id="table">
            <table>
                <tr>
                    <th>#</th>
                    <th>product name</th>
                    <th>price per Item</th>
                    <Th>Category</Th>
                    <Th>Total price</Th>

                </tr>
                <tbody id="tbody">


                    <?php
                 $counter = 1;
                 $total=0;
                 foreach($products as $key)
                 {
                     $comm="SELECT * FROM `product_list` WHERE Product_ID=$key";
                     $sql=mysqli_query($con,$comm);
                     $row=mysqli_fetch_assoc($sql);
                     $code=$row["Product_code"];
                     $name=query($con,"SELECT `product Name` FROM `inventory` WHERE id = $code");
                     $pname=$name["0"];
                     
                echo'
                 <tr>
                <td><h3>'.$counter.'</h3></td>
                <td><h3>'.$pname.'</h3></td>
                <td><h3>'.$row['price'].'</h3></td>
                <td><h3>'.$row['Category'].'</h3></td>
                <hr>
                ';
                $counter++;
               $total+=$row['price'];

                 }
              
                echo'
                <td> <h3><mark>'.$total.' LE</mark></h3></td> 
                
                </tr>';
             
              
                ?>
                </tbody>
            
            </table>
        </div>

</body>

</html>