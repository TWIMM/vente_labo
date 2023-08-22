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
  <link rel="stylesheet" href="./assets/css/style.css">

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


  <main>
    <article>






      <!-- 
        - #COLLECTION
      -->

     

      <!-- 
        - #PRODUCT
      -->

      <section class="section product">
        <div class="container">

          <h2 class="h2 section-title"> <?php  $categorie = $produits -> getProductCategory( $_SESSION['id_categorie'] ); echo $categorie['libelle'] ?></h2>
          
        
          <ul class="product-list">


          <?php
            $myProducts = $produits -> getSpecifiqueProd( $_SESSION['id_categorie'] );
            
            
            foreach ($myProducts as $eachproduit) {
              $categorie = $produits -> getProductCategory($eachproduit['id_category']);

              /*               
              if(isset($_POST['addtocart'.$eachproduit['id'].''])){

                $insertProduit-> insertInCart ($eachproduit['id'] , 1);

              } */

              

              echo ' 
               
                <form  method="POST">
             
                
                  <li class="product-item">
                  <div class="product-card" tabindex="0">

                    <figure class="card-banner">
                      <img src="./assets/images/'.$eachproduit['myimage'].'" width="312" height="350" loading="lazy"
                        alt="Running Sneaker Shoes" class="image-contain">

                      <div class="card-badge">New</div>

                      <ul class="card-action-list">

                        <li class="card-action-item">
                          
                            <button type="button" onclick="checkIfClicked('.$eachproduit['id'].')" name="addtocart'.$eachproduit['id'].'" class="card-action-btn" aria-labelledby="card-label-1">
                              <ion-icon name="cart-outline"></ion-icon>
                            </button>
                         

                          <div class="card-action-tooltip" id="card-label-1">Add to Cart</div>
                        </li>

                        <li class="card-action-item">
                          <button class="card-action-btn" aria-labelledby="card-label-2">
                            <ion-icon name="heart-outline"></ion-icon>
                          </button>

                          <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                        </li>

                        <li class="card-action-item">
                          <button class="card-action-btn" aria-labelledby="card-label-3">
                            <ion-icon name="eye-outline"></ion-icon>
                          </button>

                          <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                        </li>

                        <li class="card-action-item">
                          <button class="card-action-btn" aria-labelledby="card-label-4">
                            <ion-icon name="repeat-outline"></ion-icon>
                          </button>

                          <div class="card-action-tooltip" id="card-label-4">Compare</div>
                        </li>

                      </ul>
                    </figure>

                    <div class="card-content">

                      <div style="font-size:14px; font-weight:bold" class="card-cat">'.
                      $categorie['libelle']

                      .'</div>

                      <h3 class="h3 card-title">
                        <a href="#">'. $eachproduit['libelle'].'</a>
                      </h3>

                      <data class="card-price" value="'. $eachproduit['prix'].'">'. number_format( $eachproduit['prix'] ).' FCFA</data>

                    </div>

                  </div>
                </li>
                </form> 
              ';
            }

          ?>


           

          </ul>

        </div>
      </section>


     
      <section class="section service">
        <div class="container">

          <ul class="service-list">

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-1.png" width="53" height="28" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Livraison gratuite</h3>

                  <p class="card-text">
                    A partir de <span> 200, 000 FCFA d'achat</span>
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-2.png" width="43" height="35" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Payement sécurisé</h3>

                  <p class="card-text">
                    Payement rapide
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-3.png" width="40" height="40" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Satisfait ou remboursé</h3>

                  <p class="card-text">
                    Remboursement en quelques semaine
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-4.png" width="40" height="40" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Service client actif 24/7</h3>

                  <p class="card-text">
                    Retour au client rapide
                  </p>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>

      
    </article>
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

                <span class="footer-link-text"><?php echo $configSite['mail_pro']  ;?></span>
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