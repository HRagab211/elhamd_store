<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="../css/panel.css">
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
          <a href="../panel.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#" class="active">
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
          <a href="../productlist/productlist.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Product list</span>
          </a>
        </li>
        <li>
          <a href="../orders/orderview.php">
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
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Inventory</span>
      </div>
    </nav>
<?php
require_once("./header.php");
require_once("../suppliers/functions.php");
website_head("Add information", true);
$emp=[];
$supp=[];
$con=connectDB();
$sql="SELECT * FROM employees";
$result1=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result1))
{
    array_push($emp,$row["Name"]);
}
$sql2="SELECT * FROM suppliers";
$result2=mysqli_query($con,$sql2);
while($row=mysqli_fetch_assoc($result2))
{
    array_push($supp,$row["Name"]);
}

?>

<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="text-capitalize" style = "margin: 30px 0 0 0;">Add product to inventory</h2>
        </div>
        <form method="POST" action="./handel_add.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> product Name </label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"> Quantity </label>
                <input type="text" name="quantity" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Purchased price per unit</label>
                <input type="text" name="price" class="form-control" id="exampleInputPassword1">
            </div>


            <div class="mb-3">
                <select name="by" id="category" calss="form-control">
                    <option value="Toilete">Order Recived By</option>
                    <?php
                    foreach($emp as $key)
                    {
                     echo
                     '<option value="'.$key.'">'.$key.'</option>';
                     break;
                     }?>
                    <br>
                </select>
            </div>

            <div class="mb-3">
                <select name="from" id="category" calss="form-control">
                    <option value="Toilete">Order Recived From</option>
                    <?php
                    foreach($supp as $key)
                    {
                     echo
                     '<option value="'.$key.'">'.$key.'</option>';
                     break;
                     }?>
                    <br>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input type="Date" name="date" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <button type="submit" name="btn_clicked" class="btn btn-primary">save info</button>
            <a type="button" href="./inventory.php" class="btn btn-outline-secondary">back</a>
        </form>

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

</html>>