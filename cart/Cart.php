<?php
require_once("./header.php");
session_start();
if (isset($_SESSION["id"])){
website_head("Cart", true);
}
else{
    header("location:../login/login.php");
}

?>
<head>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 14px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 20px 2px;
  cursor: pointer;
}
</style>
</head>
<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="text-capitalize">Cart</h2>
        </div>

        <nav style="--bs-breadcrumb-divider: '>'; background-color:#efefef; padding:1rem;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        <?php
        require_once "../functions/functions.php";
        $c_id=$_SESSION["id"];
        $con = connectDB();
        $command = "SELECT * FROM `cart` WHERE Customer_ID ='$c_id'";
        $result = mysqli_query($con,$command);
        $products=[];
        while($row = mysqli_fetch_assoc($result)){
            array_push($products,$row["Product_ID"]);
    
        }

        if($result === false){
            echo"<h4>your cart is Empty! you can Buy some product</h4>";
        }else{
            if(mysqli_num_rows($result) > 0){
                echo'
                <table class="table">
            <thead>
                <tr>
                    <th scope="col"> #</th>
                    <th scope="col">Product name</th>
                    <th scope="col">product price</th>
                    <th scope="col">product category</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
            ';
            $counter = 1;
            foreach($products as $key)
            {
                $comm="SELECT * FROM `product_list` WHERE Product_ID=$key";
                $sql=mysqli_query($con,$comm);
                $row=mysqli_fetch_assoc($sql);
                $code=$row["Product_code"];
                $name=query($con,"SELECT `product Name` FROM `inventory` WHERE id = $code");
                $pname=$name["0"];
                
                echo"
                <tr>
                    <th scope='row'>$counter</th>
                    <td>".$pname."</td>
                    <td>".$row['price']."</td>
                    <td>".$row['Category']."</td>
                <td><a type='button' href='./Delete.php?id=$key' class='btn btn-danger'>Delete</a></td>
                </tr>
                ";
                $counter++;   
            }
            $_SESSION["success"]='';
            echo"</tbody>
            </table>";
            echo'
            <a type="button" class="button" href="./overall.php?"> Confirm order</a>';
            }else{
                echo"<h4>your cart is Empty? you can Buy some product!</h4>";   
            }
        }
?>
        
                



    </div>
</section>
</body>

</html>