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
            <h2 class="text-capitalize">Edit information</h2>
        </div>

        <nav style="--bs-breadcrumb-divider: '>'; background-color:#efefef; padding:1rem;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../panel.php">panel</a></li>
                <li class="breadcrumb-item"><a href="./inventory.php">inventory info</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <form method="POST" action="./edithandle.php">
            <?php
                require_once "../suppliers/functions.php";
                $id=$_GET["id"];
                $con=connectDB();
                $command = "SELECT * FROM inventory where ID = $id";

                $result= mysqli_query($con,$command);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo
                        '
                        <input type"hidden" name="ID" style="display:none;" value="'.$id.'">

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> product Name </label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value='.$row["product Name"].'>
                    </div>
                  
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> Quantity </label>
                        <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value='.$row["Quantity"].'>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Purchased price per unit</label>
                        <input type="text" name="price" class="form-control" id="exampleInputPassword1" value='.$row["price"].'>
                    </div>
        
                  
                    <div class="mb-3">
                        <select name="by" id="category" calss="form-control">
                            <option value="Toilete">Order Recived By</option>
                            ';
                            foreach($emp as $key)
                            {
                             echo
                             '<option value="'.$key.'">'.$key.'</option>';
                             break;
                             }
                             echo'
                            <br>
                        </select>
                    </div>
                   
                    <div class="mb-3">
                        <select name="from" id="category" calss="form-control">
                            <option value="Toilete">Order Recived From</option>
                            ';
                            foreach($supp as $key)
                    {
                     echo
                     '<option value="'.$key.'">'.$key.'</option>';
                     break;
                     }
                            echo'
                            <br>
                        </select>
                    </div>

                        ';
                    }
                }
            ?>








            <button type="submit" name="btn_clicked" class="btn btn-primary">save info</button>
            <a type="button" href="./inventory.php" class="btn btn-outline-secondary">back</a>
        </form>

    </div>
</section>
</body>

</html>