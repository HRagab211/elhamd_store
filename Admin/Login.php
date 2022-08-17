<?php
session_start();
if (isset($_SESSION["errors"]))
{
  $errors=$_SESSION["errors"];
  unset($_SESSION["errors"]);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/Login.css">
  </head>
  <body>
    <div class="var">
      <form action="./handle/loginhandle.php" method="POST">
        <?php if (isset($errors))
        {
          foreach ($errors as $key)
          {
            if (gettype($key) == "string") {
            echo " $key";
            echo "<br>";
            }
          }
        }
        ?>
      <input type="text" name="username" id="y" placeholder="Username">
      <br><br>
      <input type="password" name="password" id="y" value="" placeholder="Password" ><br><br><br>
      <input type="submit" name="submit"  class=" button"  >
    </form>
    </div>
  </body>
</html>
