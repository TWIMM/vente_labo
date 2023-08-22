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
        <img src="./assets/images/logocentral.png" width="130" height="100" alt="Footcap logo">
      </a>

      <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="./assets/images/logocentral.png" width="150" height="100" alt="Footcap logo">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="index.php" class="navbar-link">Acceuil</a>
          </li>

          <li class="navbar-item">
            <a href="Apropos/index.php" class="navbar-link">A propos</a>
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

          <li id='menuButton'>
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
        - #HERO
      -->

      <section class="section hero" style="background-image: url('./assets/images/blue.jpeg'); background-size:cover ; width:100% ; object-fit:cover">
        <div class="container">

          <h2 style=' color:white ; font-weight:bold' class="h1 hero-title">
              Bienvenu sur <?php echo $configSite['nom_site']  ;?>
          </h2>

          <p style=' color:white ; font-weight:normal' class="hero-text">
            Que vous soyez un professionnel de la santé, un scientifique ou un chercheur, 
            nous sommes déterminés à vous fournir les outils nécessaires pour des expériences précises et réussies. 
            Explorez notre gamme pour découvrir des solutions qui garantissent l'excellence dans vos projets de laboratoire.
          </p>

          <button onclick="relocate()" style='background-color:rgb(0, 0, 0, 0.99); border:none' class="btn btn-primary">
            <span>Liste de produit</span> 

            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
          </button>

        </div>
      </section>





      <!-- 
        - #COLLECTION
      -->

      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          
                
        <?php
     
          $myCategories = $categories -> getCategories();
          foreach ($myCategories as $eachchategorie) {
            echo ' 
             <div class="swiper-slide">
                <ul class="collection-list has-scrollbar">

                  <li style="background-color:rgb(62, 172, 232); border-radius: 8px; width:90%">
                    <div class="collection-card" >
                      <h3 class="h4 card-title">'. $eachchategorie['libelle'].'</h3>
                      <img style="width:100%;  background-size: cover; height:60%" src="./assets/images/equip.png"/>
                      <a onclick="navigateToCategorie('.$eachchategorie['id_categorie'].')" style="background-color:black; color:white" href="#" class="btn btn-secondary">
                        <span>Voir la catégorie</span>
      
                        <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                      </a>
                    </div>
                  </li>
               </ul>
 
             </div>
            ';
          }

        ?>

        </div>
        <div class="swiper-pagination"></div>
      </div>

      <!-- 
        - #PRODUCT
      -->

      <section class="section product">
        <div class="container">

          <h2 class="h2 section-title">Quelques produits</h2>
          
        
          <ul class="product-list">


          <?php
            $myProducts = $produits -> getProduits();
            //print_r($_SESSION['cart']);
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
                         

                          <div class="card-action-tooltip" id="card-label-1">Ajouter au panier</div>
                        </li>

                        <li class="card-action-item">
                          <button type="button" onclick="voirdetails('.$eachproduit['id'].')" class="card-action-btn" aria-labelledby="card-label-3">
                            <ion-icon name="eye-outline"></ion-icon>
                          </button>

                          <div class="card-action-tooltip" id="card-label-3">Voir détails</div>
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


      <!-- 
        - #CTA
      -->

      <section class="section cta">
        <div class="container">

          <ul class="cta-list">

            <li>
              <div class="cta-card" style="background-image: url('./assets/images/verrerieblue.jpg')">
               
                <h3 style=' color:black'  class="h2 card-title">Des prix alléchants</h3>

                <a href="#" class="btn btn-link">
                      <a style="background-color:black; width:50%; color:white" href="#" class="btn btn-secondary">
                        <span>Nos produits</span>
      
                        <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                      </a>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="cta-card" style="background-image: url('./assets/images/verrerievert.jpg')">
                
                <h3 style=' color:black'  class="h2 card-title">Livraison possible à domicile</h3>

                <a href="#" class="btn btn-link">
                      <a style="background-color:black; width:50%; color:white" href="#" class="btn btn-secondary">
                        <span>Nos produits</span>
      
                        <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                      </a>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #SPECIAL
      -->

      <section class="section special">
        <div class="container">

          <div class="special-banner" style="background-image: url('./assets/images/centrifugeuses_rotofix32a-2019-removebg-preview.png')">
            <h2 class="h3 banner-title">Centrifugeuse classique </h2>

            <a href="#" class="btn btn-link">
              <span>Voir plus</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>

          <div class="special-product">

            <h2 class="h2 section-title">
              <span class="text">  Les plus vendus</span>

            
            </h2>

            <ul class="has-scrollbar">
                <?php
                  $BestSellersPro = $BestSellers -> getProduits();
                  foreach ($BestSellersPro as $eachBestPro) {
                    $ProdDetail = $BestSellers -> getProductProduitDetail($eachBestPro['id_produit']);
                    $categorie = $produits -> getProductCategory($ProdDetail['id_category']);
                    echo ' 
                        <li class="product-item">
                        <div class="product-card" tabindex="0">
        
                          <figure class="card-banner">
                            <img src="./assets/images/'. $ProdDetail['myimage'].'" width="312" height="350" loading="lazy"
                              alt="Running Sneaker Shoes" class="image-contain">
        
                            <div class="card-badge">New</div>
        
                            <ul class="card-action-list">
        
                              <li class="card-action-item">
                                <button id="addtocart" type="button" onclick="checkIfClicked('.$eachBestPro['id_produit'].')" name="addtocart'.$eachBestPro['id'].'" class="card-action-btn" aria-labelledby="card-label-1">
                                  <ion-icon name="cart-outline"></ion-icon>
                                </button>
        
                                <div class="card-action-tooltip" id="card-label-1">Ajouter au panier</div>
                              </li>
        
        
                              <li class="card-action-item">
                                <button onclick="voirdetails('.$eachBestPro['id_produit'].')" class="card-action-btn" aria-labelledby="card-label-3">
                                  <ion-icon name="eye-outline"></ion-icon>
                                </button>
        
                                <div class="card-action-tooltip" id="card-label-3">Voir détails</div>
                              </li>
        
        
                            </ul>
                          </figure>
        
                          <div class="card-content">
        
                            <div class="card-cat">
                              <a href="#" class="card-cat-link">'. $categorie['libelle'].'</a>
                            </div>
        
                            <h3 class="h3 card-title">
                              <a href="#">'. $ProdDetail['libelle'].'</a>
                            </h3>
        
                            <data class="card-price" value="'.$ProdDetail['prix'] .'">'. number_format( $ProdDetail['prix'] ).' FCFA</data>
        
                          </div>
        
                        </div>
                      </li>
                    
                    ';
                  }

              ?>

            </ul>

          </div>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

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

          <div class="footer-list">

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
    const detailcontainer = document.getElementById('detailcontainer');
   
    let isDisplayed = false;
    let defaultSet = true;
    let isDisplayed2 = false;
    let defaultSet2 = true;

    


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

      function relocate(){
       window.location.replace('nosproduits.php')
      }

      function navigateToCategorie(id){
        fetch(
            "CategorieAMontrer.php", {
              method:"POST", 
              headers:{
                "Accept-Content":"application/json",
                "Content-Type":"application/json"
              } , 
              body:JSON.stringify({
                id_categorie:id,
            })
            }
          ).then(
             data => data.text()
          ).then(
           
            (data) => {
              console.log(data)
              if(data === 'OK'){
                 window.location.replace('ProduitParCatégorie.php')
              }
            }
          ); 
      }
      
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



  document.addEventListener('click', function(event) {
    const specificElement = document.querySelector('.checkoutcontainer');
    const checkoutcont = document.getElementById('checkoutcont');
    const menuButton = document.querySelector('.nav-action-list');
  
      // Check if the clicked element is the specific element or its descendant
      if (event.target !== specificElement && !specificElement.contains(event.target) &&  !menuButton.contains(event.target) ) {
        checkoutcont.classList.remove("checkoutcontainer");
        checkoutcont.classList.add("menuNotDisplayed");
        isDisplayed = true;
      }
  
  });


  function voirdetails(id){

    
    fetch(
          "Productiday.php", {
              method:"POST", 
              headers:{
                "Accept-Content":"application/json",
                "Content-Type":"application/json"
              } , 
              body:JSON.stringify({
                produitid:id,
              })
            }
          ).then(
             data => data.text()
          ).then(
           
            (data) => {
              console.log(data)
              if(data === 'OK'){
                 window.location.replace('Details.php')
              }
          }
    ); 
  

  }

</script>


</body>

</html>