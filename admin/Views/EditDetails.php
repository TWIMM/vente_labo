<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$_SESSION['message'] ="";

include('../Controllers/CategoryController.php');
include('../Controllers/ProduitsController.php');

$categories = new CategoryController();
$produits = new ProduitsController();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Pharmacy world</span>
                    </a>
                </li>

                <li>
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="apps-sharp"></ion-icon>
                        </span>
                        <span class="title">Liste des produits</span>
                    </a>
                </li>

                <li>
                    <a href="AjouterProduit.php">
                        <span class="icon">
                            <ion-icon name="add"></ion-icon>
                        </span>
                        <span class="title">Ajouter produit</span>
                    </a>
                </li>

                <li>
                    <a href="AjouterCatégorie.php">
                        <span class="icon">
                            <ion-icon name="add"></ion-icon>
                        </span>
                        <span class="title">Ajouter catégorie</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="list-outline"></ion-icon>
                        </span>
                        <span class="title">Liste des commandes</span>
                    </a>
                </li>
                
                <li>
                    <a href="configuration.php">
                        <span class="icon">
                            <ion-icon name="settings"></ion-icon>
                        </span>
                        <span class="title">Reglages du site</span>
                    </a>
                </li>

               
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

            </div>

           

            <!-- ================ Order Details List ================= -->
            <div style="height:auto" style="margin-top:50px" class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Modifier les détails du produit</h2>

                        <h2> <?php  if(isset($_SESSION['message'])){
                              echo $_SESSION['message'];
                        } ?></h2>
                    
                    </div>

                    <?php

                        $categorie = $produits -> getProductCategory(ProduitsController::getSpecifiqueProduct($_SESSION['id'])['id_category']);
                        
                        
                        echo '

                       

                        <form enctype="multipart/form-data" method="POST" action="../Controllers/EditDetailController.php" style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; height:800px ; width: 90%">
                        
                          <img style="width:300px; height:300px" src="../assets/images/'.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['myimage'].'" loading="lazy"/>
                        
                          <input name="id"  type="hidden" value="'.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['id'].'"/> 
                         
                          <div style="display:flex; height:100px; flex-direction:row;justify-content:space-between; align-items:center ; width:20% ;" class="">   
                          <label class="articleimageclick" style="font-weight:bold ; cursor:pointer"> <button type="button" style="border:none; background-color:black; width:150px; height:50px; cursor:pointer; color:white"> Modifier cette image</button>  
                          </label> 
                          <input name="defaultimage" type="hidden" value="'.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['myimage'].'"/> 
                          <input name="file" style="visibility:hidden" type="file" class="articleimage"/> 
                          </div> 

                          <div style="display:flex; flex-direction:column;justify-content:space-between; align-items:center ; height:100% ; width: 60%"> 
                            <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:100% ;" class="">   
                              <label style="font-weight:bold"> Libellé : </label> 
                              <input  name="libelle" type="text" value="'.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['libelle'].'" class="input"/> 
                            </div> 
                           
                            <div style=" display:flex; flex-direction:row;justify-content:space-between; align-items:center ;width:100%" class="">   
                              <label style="font-weight:bold"> Catégorie de cet article : </label> 
                              <input name="defaultidcategory" type="hidden" class=""/> 
                              <input style="; width:70%" readonly name="categorielib" type="text" value="'. $categorie['libelle'].'" class="input"/> 
                            </div> 

                            <div style=" display:flex; flex-direction:row;justify-content:space-between; align-items:center ;width:100%" class="">   
                            <label style="font-weight:bold"> Nouvelle category : </label> 
                            <select style="border:none ; width:70%" style="background-color:transparent" class="input"  name="newcategorie" id="cars">
                              <option value="'.$categorie['libelle'].'">'.$categorie['libelle'].'</option>
                            '; 

                            ?>

                           

                            <?php
                            $myCategories = $categories -> getCategories();
                                    foreach ($myCategories as $eachcategorie) {
                                        echo'
                                        <option value="'.$eachcategorie['libelle'].'">'.$eachcategorie['libelle'].'</option>
                                        ';
                                    }
                            ?>

                            <?php

                            echo '
                                
                            </select>
                            </div> 

                            <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:100% ;" class="">   
                              <label style="font-weight:bold"> Description : </label> 
                              <textarea  name="description" style="height:auto" class="input" rows="10" cols="50"> '.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['description'].' </textarea> 
                            </div> 
                          

                            <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:100% ;" class="">   
                            <label style="font-weight:bold"> Caractéristiques : </label> 
                            <textarea  name="caracteristiques" style="height:auto" class="input" rows="10" cols="50"> '.ProduitsController::getSpecifiqueProduct($_SESSION['id'])['caracteristiques'].' </textarea> 
                            </div>      


                            <div style=" display:flex; flex-direction:row;justify-content:space-between; align-items:center ;width:50%" class="">   
                            <label style="font-weight:bold"> Prix en FCFA : </label> 
                            <input style="border:none;"  name="prix" type="text" value="'.  (ProduitsController::getSpecifiqueProduct($_SESSION['id'])['prix']).'" class="input"/> 
                            </div> 


                            <div style=" display:flex; flex-direction:row;justify-content:space-between; align-items:center ;width:50%" class="">   
                           
                            <input style="background-color: hsl(221, 96%, 61%) ; color:white ; border: none ; border-radius:5px; cursor:pointer " type="submit" value="Valider" class="input"/> 
                            </div> 
                           
                          </div>  
                        </form>
                        ';
                        ?>
                </div>

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../assets/js/main.js"></script>
    

    <script >

        document.querySelector('.articleimageclick').addEventListener('click' , ()=>{
          document.querySelector('.articleimage').click();
        })

    </script>


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>