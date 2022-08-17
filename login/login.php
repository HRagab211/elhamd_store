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
    <link rel="stylesheet" href="../css/signup.css">
    <script src="script.js"></script>
    <title>Document</title>
    <style>
        body{
            background-image:url(../images/overall.jpg); 
            background-size:contain;
            background-repeat: no-repeat;
        }
        #body{
            margin-left: 50% ;
            padding-left: 10%;
        }
     
    </style>
</head>

<body id="body">
    <div class="container">
        <div class="header">
            <h2>sign-in</h2>
        </div>
        <div id="form">
        <form id="form" method="POST" action="../handle/hLogin.php" class="form">
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
                <label for="username">Email</label>
                <input type="email" name="email" placeholder="enter your email" id="email" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password</label>
                <input type="password" name="pass" placeholder="enter your password" id="password" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <button  type="submit" name="clicked_btn" >Submit</button>
            <label> Don't have account ?</label>
            <a href="../signup.php">sign-up </a>
        </form>
        </div>
    </div>
</body>

</html>