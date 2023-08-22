<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('ConfigController.php');

$configSite = ConfigController::getSiteConfigs();




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>À propos</title>
    <link rel="stylesheet" href="style2.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div style="color:black; display:flex; flex-direction: row; justify-content: start; align-items: center;">  
      <a style="text-decoration: none; color : #0e9c80" href="../index.php">  <img src="../assets/images/logocentral.png" width="130" height="100" alt="" style="margin-left: 30px;"/>  </a> 
      <h2>
        <a style="text-decoration: none; color : #2065ba" href="../index.php">
          Acceuil
        </a>
           
       </h2>
    </div>
    

    <div class="container">
     
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
      <h3 style="color:black" class="title">À propos </h3>
         <p><?php  echo $configSite['a_propos']  ?></p>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
