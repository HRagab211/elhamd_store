<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/panel.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Elhamd Cpanel</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="../panel.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="../inventory/inventory.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Inventory</span>
          </a>
        </li>
		<li>
          <a href="../addproduct.php">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Add product to list</span>
          </a>
        </li>
        <li>
          <a href="../productlist/productlist.php" >
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Product list</span>
          </a>
        </li>
        <li>
          <a href="#" class="active">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">New orders</span>
          </a>
        </li>
        <li>
          <a href="../confirmed order/orderview.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Confirmed order</span>
          </a>
        </li>
        <li>
          <a href="../Employees/Employee.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Employee</span>
          </a>
        </li>
        <li>
          <a href="../suppliers/supplier.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Suppliers</span>
          </a>
        </li>
        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
<?php
require_once("../header.php");
website_head("Orders", true);


?>

<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="text-capitalize">Orders</h2>
            <p>
            <h3>to view order click on customer name</h3>
            </p>
        </div>
        <?php

        require_once ("../../functions/search.php");
        search();
        require_once ("../../functions/functions.php");
        $con=connectDB();
        $sql="SELECT * FROM `orders` WHERE confirmed='no' ORDER BY order_date DESC";
        $result=mysqli_query($con,$sql);
          
        if($result === false){
            echo"<h4>There are no Orders</h4>";
        }else{
            if(mysqli_num_rows($result) > 0){
                echo'
                <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email </th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
            ';
            $counter = 1;
            while($row = mysqli_fetch_assoc($result)){
                $o_id=$row["Order_ID"];
                $c_id=$row["Customer_ID"];
                $name=$row['Name'];
                $email=$row['contact_email'];
                $date=$row['order_date'];              
                echo"

                <tr>
                    <th scope='row'>$counter ) </th>
                    <td><h3><a href='./orders.php?id=$o_id & c=$c_id'>$name</a></h3></td>
                    <td>'$email'</td>
                    <td>'$date'</td>
                    <td><a type='button' href='./delete.php?id=$o_id & c=$c_id & d=$date' class='btn btn-danger'>X</a></td>

                </tr>
                ";
                $counter++;
            }
            echo"</tbody>
            </table>";
            }else{
                echo"<h4>There are no Orders</h4>";   
            }
        }
?>






    </div>
    </section>
 <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
    </div>
</section>
</body>
</html>
