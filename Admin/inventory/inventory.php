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
<?php
require_once("./header.php");
website_head("inventory information", true);


?>

<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="text-capitalize" style = "margin: 30px 0 0 ">inventory information</h2>
        </div>
        <div class="py-5">
        <a type="button" class="btn btn-outline-dark" href="./add.php" >Add new record</a>
        </div>
        <?php
        require_once ("../suppliers/functions.php");
        $con=connectDB();
        $sql="SELECT * FROM `inventory`";
        $result=mysqli_query($con,$sql);
        if($result === false){
            echo"<h4>There are no Products</h4>";
        }else{
            if(mysqli_num_rows($result) > 0){
                echo'
                <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">price</th>
                    <th scope="col">Emp-name</th>
                    <th scope="col">Supp-name</th>
                    <th scope="col">date</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
            ';
            $counter = 1;
            while($row = mysqli_fetch_assoc($result)){
                echo'

                <tr>
                    <th scope="row">'.$counter.'</th>
                    <td>'.$row["product Name"].'</td>
                    <td>'.$row["Quantity"].'</td>
                    <td>'.$row["price"].'</td>
                    <td>'.$row["employee name"].'</td>
                    <td>'.$row["supplier name"].'</td>
                    <td>'.$row["date"].'</td>
                    <td><a type="button" href="./edit.php?id='.$row["ID"].'" class="btn btn-primary">Edit</a> <a type="button" href="./delete.php?id='.$row["ID"].'" class="btn btn-danger">Delete</a></td>
                </tr>
                ';
                $counter++;
            }
            echo"</tbody>
            </table>";
            }else{
                echo"<h4>There are no data</h4>";   
            }
        }
?>
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