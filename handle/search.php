<head>
    <style>
        button{
            background-color:white;
  border: none;
  color: black;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 1100px;
  cursor: pointer;            
        }
    </style>
</head>

<?php
if (isset($_GET["submit"])) 
{
    require_once("../functions/functions.php");
    require_once("../Admin/header.php");
    website_head("search", true);
echo'<a href='.$_SERVER["HTTP_REFERER"].' class="button"><button><h1><Bold> <- </Bold>  </h1></button>  </a>';
    $ky = clean($_GET["search"]);
    try {
        $con = connectDB();
        $sql = "SELECT * FROM `orders` WHERE Name LIKE'%$ky%' AND confirmed='no' ORDER BY order_date DESC ";
        $res = mysqli_query($con, $sql);
    }
    catch (Exception $e) {
        echo "OMG! Error ???:" . $e->getMessage();
        die;
    }
    if (mysqli_num_rows($res) > 0) {
        echo '
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
        while ($row = mysqli_fetch_assoc($res)) {
            $o_id = $row["Order_ID"];
            $c_id = $row["Customer_ID"];
            $name = $row['Name'];
            $email = $row['contact_email'];
            $date = $row['order_date'];
            echo "

            <tr>
                <th scope='row'>$counter ) </th>
                <td><h3><a href='../Admin/orders/orders.php?id=$o_id & c=$c_id'>$name</a></h3></td>
                <td>'$email'</td>
                <td>'$date'</td>
                <td><a type='button' href='../Admin/orders/delete.php?id=$o_id & c=$c_id' class='btn btn-danger'>X</a></td>
            </tr>
            ";
            $counter++;
        }
        echo "</tbody>
        </table>";
        
        
    }
    
    
    

    else {
        die(" Sorry your search Is Not found !!!");
    }


}
else {
    die("Access IS Denied");
}
?>

