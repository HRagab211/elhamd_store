<?php
if(isset($_GET["id"]) and isset($_GET["c"]))
{
    session_start();
    $order=$_GET["id"];
    $customer=$_GET["c"];
require_once("../../functions/functions.php");
$con=connectDB();
$sql="SELECT * FROM `orders` WHERE Order_ID=$order";
$query=mysqli_query($con,$sql);
$result=mysqli_fetch_assoc($query);
$date=$result["order_date"];
}


?>
<section>
<nav style="--bs-breadcrumb-divider: '>'; background-color:#efefef; padding:1rem;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/elhamd/Admin/panel.php">panel</a></li>
                <li class="breadcrumb-item"><a href="./orderview.php">View order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                <button class="button" onclick="window.print()">Print</button>
            </ol>
        </nav>
</section>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    td,th{
text-indent: 50px;
    }
.button {
  background-color: #673ab7;
  border: none;
  color: white;
  padding: 15px 40px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 1100px;
  cursor: pointer;
}
</style>
</head>

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        
                    </div>
                    <?php
                    echo'
                    <div class="col company-details">
                        <h2 class="name">
                            Order to                    :  '.$result["Name"].'
                        </h2>
                        <div><h5> city                      :  '.$result["ciity"].'</h5></div>
                        <div><h5> Address                   :  '.$result["order_destination"].'</h5></div>
                        <div> <h5>phone                     :  '.$result["phone"].'</h5></div>
                        <div> <h5>Email                     :  '.$result["contact_email"].'</h5></div>
                                         <div><h5>zip code :  '.$result["zip_code"].'</h5></div>
                        <div class="date"></h5>Date of order :  '. $date.'</h5></div>

                    </div>
                    ';?>
                </div>
            </header>
            <main>
                <?php
                echo'
                <div class="row contacts">
                  
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Order number : '.$order.'</h1>
                    </div>
                </div>
                ';
                
                ?>
                
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th><h5>#</h5></th>
                            <th class="text-left"><h4>product name</h4></th>
                            <th class="text-right"><h4>order price</h4></th>
                            <th class="text-right"><h4>order category</h4></th>
                            <th class="text-right"><h4>TOTAL</h4></th>
                        </tr>
                    </thead>
                  <?php
                  $query="SELECT Product_ID FROM `product_orderd` WHERE Customer_ID = $customer And Order_ID='$order'";
                  $re=mysqli_query($con,$query);
                  $products=[];
                  
                  while($row=mysqli_fetch_assoc($re)){
                      array_push($products,$row["Product_ID"]);
                    }
                    $_SESSION["products"]=$products;
                    if(count($products)>0)
                 {
                     $counter=0;
                     $total=0;
                     foreach ($products as $key)
                     {
                         $orderquery="SELECT * FROM `product_list` WHERE Product_ID = $key";
                         $resultorder=mysqli_query($con,$orderquery);
                         $or=mysqli_fetch_assoc($resultorder);
                         $counter++;
                         $total+=$or["price"];
                $code=$or["Product_code"];
                $name=query($con,"SELECT `product Name` FROM `inventory` WHERE id = $code");
                $pname=$name["0"];
                
                           echo'
                    <tbody>
                         
                    <tr>
                            <td class="no"><h4>'.$counter.'</h4></td>
                            <td class="text-left"><h4>'.$pname.'</h4></td>
                            <td class="unit"><h4>'.$or["price"].'</h4></td>
                            <td class="qty"><h4>'.$or["Category"].'</h4></td>
                            ';}}
                            echo'
                            <td class="total"><h4> <mark>'.$total.' LE</mark></h4> </td>
                        </tr>
                        
                     
                    </tbody>
                    ';
                     ?> 
                </table>
                <?php
                echo
                '<a href="./confirmorder.php?c='.$order.'"> <button class="button"> Confirm order</button></a>' ;              

?>
    </div>
</div>