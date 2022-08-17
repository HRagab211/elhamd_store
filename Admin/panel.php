<?php
include("./suppliers/functions.php");
session_start();
$con=connectDB();
//---------------------------------------------------------------------
//TODAY'S DATE
$date=date("y-m-d");
//---------------------------------------------------------------------
$customers=query($con,"SELECT COUNT(Customer_ID) FROM `customers`");
//---------------------------------------------------------------------
$orders=query($con,"SELECT COUNT(Order_ID) FROM orders WHERE order_date LIKE'%$date%' AND confirmed ='no'");
//---------------------------------------------------------------------
//Total sales per day for confirmed order
$details=query($con,"SELECT order_date FROM `orders` WHERE confirmed ='yes' AND order_date LIKE'%$date%'");
$ids=[];
$totalsales=0;
foreach($details as $key)
{
  $id=query($con,"SELECT Product_ID FROM `product_orderd` WHERE date='$key'");
  foreach($id as $value)
  {
array_push($ids,$value);
  }
}
foreach($ids as $key)
{
  $price=query($con,"SELECT price FROM `product_list` WHERE Product_ID=$key");
  foreach($price as $value)
  {
    $totalsales+=$value;
  }
}
//---------------------------------------------------------------------
//confirmed order
$confirmed=query($con,"SELECT COUNT(*) FROM `orders` WHERE confirmed='yes' AND order_date LIKE '%$date%'");
//---------------------------------------------------------------------
//Recent sales
$all="SELECT * FROM `orders` WHERE confirmed='yes' AND order_date LIKE'%$date%'";
$res=mysqli_query($con,$all);
//----------------------------------------------------------------------
//Inventory ALert
$alert=("SELECT `ID`,`product Name`,`Quantity` FROM `inventory` WHERE Quantity < 10");
$invpro=mysqli_query($con,$alert);


//----------------------------------------------------

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/panel.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <span class="logo_name">Elhamd CPanel</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="./inventory/inventory.php">
          <i class='bx bx-list-ul' ></i>
            <span class="links_name">INVENTORY</span>
          </a>
        </li>
		<li>
          <a href="./addproduct.php">
          <i class='bx bx-list-ul' ></i>
            <span class="links_name">Add product to list</span>
          </a>
        </li>
        <li>
          <a href="./productlist/productlist.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">product list</span>
          </a>
        </li>
        <li>
          <a href="./orders/orderview.php">
          <i class='bx bx-list-ul' ></i>
            <span class="links_name">New orders</span>
          </a>
        </li>
        <li>
          <a href="./confirmed order/orderview.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">confirmed order</span>
          </a>
        </li>
        <li>
          <a href="./Employees/Employee.php">
          <i class='bx bx-user' ></i>
            <span class="links_name">Employee</span>
          </a>
        </li>
        <li>
          <a href="./suppliers/supplier.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Suppliers</span>
          </a>
        </li>
        <li class="log_out">
          <a href="./logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total users</div>
            <div class="number"><?php echo$customers["0"];?></div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total new Orders</div>
            <div class="number"><?php echo $orders["0"]?></div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Confirmed Orders</div>
            <div class="number"><?php echo $confirmed["0"];?></div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Today's Profit</div>
            <div class="number"><?php echo $totalsales; ?> LE</div>
          </div>
        </div>
 
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Sales</div>
          <?php
while ($row=mysqli_fetch_assoc($res)) {

  echo'
          <div class="sales-details">

            <ul class="details">
              <!-- stert -->

              <li class="topic">Date</li>
              <li><a href="#">'.$date.'</a></li>
            </ul>
            <ul class="details">
            <li class="topic">Customer</li>
            <li><a href="#">'.$row["Name"].'</a></li>
          </ul>
          <ul class="details">
            <li class="topic">Sales</li>
            <li><a href="#">Done</a></li>
          </ul>
          ';
          $to=query($con,"SELECT Product_ID FROM `product_orderd` WHERE Order_ID=".$row["Order_ID"]);
          $totalprice=0;
          foreach($to as $key)
          {
            $products=query($con,"SELECT price FROM `product_list` WHERE Product_ID=$key");
          foreach($products as $value)
          {
            $totalprice+=$value;          }
          }
          echo'
          <ul class="details">
            <li class="topic">Total</li>
            <li><a href="#">'.$totalprice.' LE</a></li>
          </ul>
 

          <!-- END -->
          </div>
          ';
        }
                  ?>
        </div>
        <div class="top-sales box">
          <div class="title">inventory Shortage ALert</div>
          <?php
while ($row=mysqli_fetch_assoc($invpro)) {
//   $image=("SELECT `Image` FROM `product_list` WHERE `Product_code`=".$row["ID"]);
// $imageresult=  mysqli_query($con,$image);
//   $ph=mysqli_fetch_assoc($imageresult);
//   var_dump($ph);

    echo'
          <ul class="top-sales-details">
          <li>
            <a href="#">
            ';
            echo'
              <span class="product">'.$row["product Name"].'</span>
            </a>
            <span class="price"> <h3 style="color:red;">'.$row["Quantity"].'</h3></span>
          </li>
          </ul>
          ';
}
?>
        </div>
      </div>
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

</body>
</html>

