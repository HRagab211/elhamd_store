<?php
require_once("./header.php");
website_head("edit information", true);

?>

<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="text-capitalize">Edit information</h2>
        </div>

        <nav style="--bs-breadcrumb-divider: '>'; background-color:#efefef; padding:1rem;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../panel.php">panel</a></li>
                <li class="breadcrumb-item"><a href="./Employee.php">Employee info</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <form method="POST" action="./edithandle.php">
            <?php
                require_once "./functions.php";
                $id=$_GET["id"];
                $con=connectDB();
                $command = "SELECT * FROM employees where employee_id = $id";

                $result= mysqli_query($con,$command);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo
                        '
                        <input type"hidden" name="ID" style="display:none;" value="'.$id.'">

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Employee Name</label>
                        <input type="text" name="name" value="'.$row["Name"].'" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Employee Number</label>
                <input type="text" value="'.$row["phone_Number"].'" name="phone" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Employee Role</label>
                <input type="text" value="'.$row["role"].'" name="role" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Employee Salray</label>
                <input type="text" value="'.$row["salary"].'" name="salary" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Employee email</label>
            <input type="text" value="'.$row["E_mail"].'" name="email" class="form-control" id="exampleInputPassword1">
        </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <textarea row=3 name="Address" class="form-control" id="exampleInputPassword1">'.$row["Address"].'</textarea>
            </div>

                        ';
                    }
                }
            ?>
            

            

            

            

            <button type="submit" name="btn_clicked" class="btn btn-primary">save info</button>
            <a type="button" href="./Employee.php" class="btn btn-outline-secondary">back</a>
        </form>

    </div>
</section>
</body>

</html>