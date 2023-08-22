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
    <title>Contactez - nous</title>
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
        <div class="contact-info">
          <h3 class="title">Contactez-nous </h3>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p> <?php  echo $configSite['adresse']  ?> </p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p><?php  echo $configSite['admin_email']  ?></p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p><?php  echo $configSite['num_pro']  ?></p>
            </div>
          </div>

          <div class="social-media">
            <p>Nos réseaux sociaux :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="index.html" autocomplete="off">
            <h3 class="title">Envoyez un méssage</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Sujet</label>
              <span>Sujet</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" />
              <label for="">Téléphone</label>
              <span>Téléphone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Envoyer" class="btn" />
          </form>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
