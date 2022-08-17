<?php
session_start();
if (isset($_SESSION["error"])) {
    $error_list = $_SESSION["error"];
    unset($_SESSION["error"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <script src="script.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>sign-up</h2>
        </div>
        <form id="form"  action="./handle/hsignup.php" method="POST" class="form">
            <?php
         
            if (isset($error_list)) {
              foreach ($error_list as $error) {
                if (gettype($error) == "string") {
                  echo "<h5 style='color:red;'>$error</h5>";
                }
              }
            }
            ?>
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text"  name="user"placeholder="Your Username" id="username" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Email</label>
                <input type="email" name="email" placeholder="Your Email" id="email" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password</label>
                <input type="password" name="pass" placeholder="Password" id="password" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <button name="clicked_btn">Submit</button>
            <label for=""> Already Have an account ?</label>
            <a href="./login/login.php"> Log in</a>
        </form>
    </div>
</body>

</html>