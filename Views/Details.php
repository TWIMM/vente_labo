<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../Controllers/CategoryController.php');
include('../Controllers/ProduitsController.php');
include('../Controllers/BestSellerController.php');
include('../Controllers/ConfigurationSiteController.php');
include('../Controllers/ShoppingCartController.php');

$configSite = ConfigurationController::getSiteConfigs();
$categories = new CategoryController();
$BestSellers = new BestSellerController();
$produits = new ProduitsController();
$insertProduit = new ShoppingCartController();


if(isset($_SESSION['cart'])){
  $cartSize = sizeof($_SESSION['cart']);
}else {
  $cartSize = 0;
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo $configSite['nom_site']  ;?> </title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">

  <!-- 
    - preload banner
  -->
  <link rel="preload" href="./assets/images/hero-banner.png" as="image">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div style='height:100px' class="container">

      <div class="overlay" data-overlay></div>

      <a href="#" class="logo">
        <img src="./assets/images/logocentral.png" width="120" height="100" alt="Footcap logo">
      </a>

      <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="./assets/images/logocentral.png" width="130" height="100" alt="Footcap logo">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="index.php" class="navbar-link">Acceuil</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link">A propos</a>
          </li>

          <li class="navbar-item">
            <a href="nosproduits.php" class="navbar-link">Nos produits</a>
          </li>

          <li class="navbar-item">
            <a href="Contact/index.php" class="navbar-link">Contact</a>
          </li>

        </ul>

        <ul class="nav-action-list">

          <li>
            <button class="nav-action-btn">
              <ion-icon name="search-outline" aria-hidden="true"></ion-icon>

              <span class="nav-action-text">Search</span>
            </button>
          </li>

          <li>
            <a href="#" class="nav-action-btn">
              <ion-icon name="person-outline" aria-hidden="true"></ion-icon>

              <span class="nav-action-text">Login / Register</span>
            </a>
          </li>

       

          <li>
            <button id='shoppingcart' class="nav-action-btn">
              <ion-icon name="bag-outline" aria-hidden="true"></ion-icon>

              <data class="nav-action-badge" value="4" aria-hidden="true"><?php echo $cartSize ?></data>
            </button>
          </li>

        </ul>

      </nav>

    </div>
  </header>


  <?php include('Checkout.php')  ?>
    

  <main style='margin-top:100px ;  display:flex; flex-direction:column;justify-content:space-between; align-items:center ;width: 100%; height:auto'>
    
    <h2  style="margin-bottom:30px" > Détails du produit</h2>

    <?php

    $categorie = $produits -> getProductCategory(ProduitsController::getSpecifiqueProduct($_SESSION['id'])['id_category']);
     
    echo '

    <div style="display:flex; flex-direction:row;justify-content:center; align-items:center ; height:600px ; width: 90%">
     
      <img style="width:20%; height:250px" src="./assets/images/'.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['myimage'].'" loading="lazy"/>

      <div style="display:flex; flex-direction:column;justify-content:space-around; align-items:center ; height:100% ; width: 80%"> 
        <h5 style="font-size:22px"> 
          Libellé :    '.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['libelle'].'
        </h5> 


        <h5 style="font-size:22px" class="title">   
         Catégorie : '. $categorie['libelle'] .'
        </h5> 


        <h5 style="font-size:22px" class="title">   
         Description :  
        </h5> 
      

        <textarea  style="height:auto ; border:none ; width: 80%" class="inputt" rows="10" readonly>   
        '.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['description'].'
        </textarea>   


        <h5 style="font-size:22px" style="font-size:22px" class="title">   
         Caractéristiques :  
        </h5> 
      


        <textarea  style="height:auto ; border:none; width: 80%" class="inputt" rows="10" readonly>   
        '.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['caracteristiques'].'
        </textarea>   
        
        <h5 style="font-size:22px" class="title">   
          Prix :  '. number_format(ProduitsController::getSpecifiqueProduct($_SESSION['id'])['prix']).' FCFA
        </h5> 

        <button type="button" onclick="checkIfClicked('.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['id'].')" name="addtocart" style="width:160px ; height:50px ; color:white; background-color:hsl(221, 96%, 61%) ;font-weight:bold; display:flex; justify-content:center; align-items:center">
          Ajouter au panier   <ion-icon name="cart-outline"></ion-icon>
        </button>
      </div>  
    </div>
    ';
    ?>
    
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top section">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/logocentral.png" width="160" height="100" alt="Footcap logo">
          </a>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <div class="footer-link-box">

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Nous contacter</p>
            </li>

            <li>
              <address class="footer-link">
                <ion-icon name="location"></ion-icon>

                <span class="footer-link-text">
                  <?php echo $configSite['adresse']  ;?>
                </span>
              </address>
            </li>

            <li>
              <a href="tel:+557343673257" class="footer-link">
                <ion-icon name="call"></ion-icon>

                <span class="footer-link-text"><?php echo $configSite['num_pro']  ;?></span>
              </a>
            </li>

            <li>
              <a href="mailto:footcap@help.com" class="footer-link">
                <ion-icon name="mail"></ion-icon>

                <span class="footer-link-text"><?php echo $configSite['admin_email']  ;?></span>
              </a>
            </li>

          </ul>

          <ul class="footer-list">

            <li>
              <p class="footer-list-title">Raccourcis</p>
            </li>

            <li>
              <a href="#" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text"> Se connecter</span>
              </a>
            </li>

            <li>
              <a href="#" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">Mon panier</span>
              </a>
            </li>

            <li>
              <a href="#" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">Nos produits</span>
              </a>
            </li>

            <li>
              <a href="#" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>

                <span class="footer-link-text">catégorie</span>
              </a>
            </li>

          </ul>


          <div class="footer-list">

            <p class="footer-list-title">A propos</p>

            <p class="newsletter-text">
              Authoritatively morph 24/7 potentialities with error-free partnerships.
            </p>

          </div>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2022 <a href="#" class="copyright-link">Réalisée par la SGTIC</a>. All Rights Reserved
        </p>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->


  <script>
  const shoppingcart =  document.getElementById('shoppingcart');
    const checkoutcont = document.getElementById('checkoutcont');
   
    let isDisplayed = false;
    let defaultSet = true;


    


    shoppingcart.addEventListener('click', ()=>{
      if(defaultSet === true ){
        checkoutcont.classList.remove("default");
        checkoutcont.classList.add("checkoutcontainer");
        defaultSet = false
        isDisplayed = true;
      }
      if(isDisplayed === false ){
        checkoutcont.classList.remove("checkoutcontainer");
        checkoutcont.classList.add("menuNotDisplayed");
        isDisplayed = true;
        console.log(isDisplayed)
      } else if(isDisplayed === true ){
        checkoutcont.classList.remove("menuNotDisplayed");
        checkoutcont.classList.add("checkoutcontainer");
        isDisplayed = false;
        console.log(isDisplayed)
      }
    })


  


    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 4,
      spaceBetween: 30,
      centeredSlides: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

    
<script>
      
      function checkIfClicked(id , quantite){
          fetch(
            "cart.php", {
              method:"POST", 
              headers:{
                "Accept-Content":"application/json",
                "Content-Type":"application/json"
              } , 
              body:JSON.stringify({
              idproduit:id,
              quantite:1,
              })
            }
          ).then(
             data => data.text()
          ).then(
           
            (data) => {
              console.log(data)
              if(data === 'Added'){
                 window.location.replace('index.php')
              }
            }
          ); 
  
      }
</script>

</body>

</html>