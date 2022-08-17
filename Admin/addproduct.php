<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
<meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="./css/panel.css">
    <!-- Boxicons CDN Link -->
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
          <a href="./panel.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="./inventory/inventory.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Inventory</span>
          </a>
        </li>
		<li>
          <a href="#" class="active">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Add product to list</span>
          </a>
        </li>
        <li>
          <a href="./productlist/productlist.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Product list</span>
          </a>
        </li>
        <li>
          <a href="./orders/orderview.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">New orders</span>
          </a>
        </li>
        <li>
          <a href="./confirmed order/orderview.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Confirmed order</span>
          </a>
        </li>
        <li>
          <a href="./Employees/Employee.php">
            <i class='bx bx-book-alt' ></i>
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
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">

<?php
require_once("./header.php");
require_once("./suppliers/functions.php");
session_start();

    website_head("Admin panel", true);
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];
        unset($_SESSION["errors"]);
    }
    $con=connectDB();
    $sql="SELECT * FROM `inventory`";
    $result=mysqli_query($con, $sql);


?>
<body>
<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="text-capitalize">Add product</h2>
            <p class="lead"><small></small></p>
        </div>
        <form enctype="multipart/form-data" action="./handle/handleaddproduct.php" method="POST">
            <?php if (isset($errors)) {
                foreach ($errors as $key) {
                    echo " $key";
                    echo "<br>";
                }
            }
            ?>
            <div class="mb-3">
                <select name="productname" id="category" calss="form-control">
                    <option value="">Products</option>
                    <?php
                        while ($row=mysqli_fetch_assoc($result)) {                          
                          
                            echo'
                            <option value="'.$row["ID"].'">'.$row["product Name"].'</option>
                            ';
                        }
                    ?>
                    <br>
                </select>
            </div>
         

            <div class="mb-3">
                <select name="category" id="category" calss="form-control">
                    <option value="Toilete">category</option>
                    <option value="Toilete">Toilete</option>
                    <option value="Tap">Tap</option>
                    <option value="Shower">Shower</option>
                    <br>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">product price</label>
                <input type="Text" name="prdouctprice" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">image</label>
                <input type="file" name="Image" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" name="add" class="btn btn-primary">Add product</button>
            <a type="button" href="./panel.php" class="btn btn-outline-secondary">back</a>
        </form>

    </div>
</section>
</body>
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
</html>