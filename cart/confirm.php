<?php
session_start();
if (!isset($_SESSION["id"]))
{
    exit("you Must log in first");
}
if(isset($_SESSION["errors"]))
{
  $errors=$_SESSION["errors"];
  unset($_SESSION["errors"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<h3>Order Confirmation</h3>
<div class="container">
  <form action="../handle/confirmation.php" method="POST">
  <?php
    if (isset($errors)) {
      foreach ($errors as $key) {
        if (gettype($key) == "string") {
          echo "<h5 style='color:red;'>$key</h5>";
        }
      }
    }
    ?>
    <label for="">Full Name</label>
    <input type="text" id="" name="Name" placeholder="Your name..">
    <label for="">phone </label>
    <input type="text" id="" name="phone" placeholder="0123456789">
    <label for="">Email </label>
    <input type="text" id="" name="email" placeholder="xxxx@gmail.com">
    <label for="">City </label>
    <input type="text" id="" name="city" placeholder="EX:Alexandria">
    <label for="">zip code </label>
    <input type="text" id="" name="zip" placeholder="10001">
    <label for="subject">Address</label>
    <textarea id="subject" name="address" placeholder="Write order Shipping Address"   style="height:200px"></textarea>
    <input type="submit"  name="submit" value="Submit">
  </form>
</div>

</body>
</html>