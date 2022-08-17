<?php
require_once("./header.php");
if (isset($_GET["id"]))
{
    $id=$_GET["id"];
    website_head("Admin panel", true);

}
$back = $_SERVER["HTTP_REFERER"];
?>

<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="text-capitalize">Product edit</h2>
            <p class="lead"><small>this page make you <strong>Edit</strong> the information of your website</small></p>
        </div>

        <nav style="--bs-breadcrumb-divider: '>'; background-color:#efefef; padding:1rem;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/elhamd/Admin/panel.php">panel</a></li>
                <li class="breadcrumb-item"><a href="./productlist.php">product list</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <form method="POST" action="./edithandle.php">
            <?php
                require_once "../../functions/functions.php";
                $con=connectDB();
                $command = "SELECT * FROM product_list where Product_ID = $id";
                $result= mysqli_query($con,$command);
                while($row=mysqli_fetch_assoc($result))
                {
                 
                            $code=$row["Product_code"];
                            $name=query($con,"SELECT `product Name` FROM `inventory` WHERE id = $code");
                            $pname=$name["0"];
                 
                
                    echo    '
                        <input type"hidden" name="id" style="display:none;" value="'.$id.'">

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">product Name</label>
                        <input type="text" name="productname" value="'.$pname.'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">price</label>
                <input type="text" value="'.$row["price"].'" name="price" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <select name="category" id="category" calss="form-control">
                    <option value="Toilete">category</option>
                    <option value="Toilete">Toilete</option>
                    <option value="Tap">Tap</option>
                    <option value="Shower">Shower</option>
                    <br>
                </select>
            </div>   ';
                }
               
            ?>
            

            

            

            

            <button type="submit" name="btn_clicked" class="btn btn-primary">save info</button>
            <a type="button" href="<?php echo $back; ?>" class="btn btn-outline-secondary">back</a>
        </form>

    </div>
</section>
</body>

</html>