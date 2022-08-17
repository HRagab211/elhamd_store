<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<style>
#div1 {
  font-size:48px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5; url=./panel.php" >

    <title></title>
    <link rel="stylesheet" href="./css/cover.css">
  </head>
  <body>
    
    
   

  <div class="parent">
  <div class="container">
    <div class="par">
    <h1> WELCOME TO EL-HAMD <br>FOR SANITARY WARE</h1>
    <h2>  MANAGEMENT SYSTEM</h2><br><br>
    <div id="div1" class="fa"></div>
  </div> 

<img src="./images/uu.jpg" class="image" alt="">
  </div>
</div>

  </body>
</html>

<script>
function hourglass() {
  var a;
  a = document.getElementById("div1");
  a.innerHTML = "&#xf251;";
  setTimeout(function () {
      a.innerHTML = "&#xf252;";
    }, 1000);
  setTimeout(function () {
      a.innerHTML = "&#xf253;";
    }, 2000);
}
hourglass();
setInterval(hourglass, 3000);
</script>