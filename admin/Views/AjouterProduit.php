<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../Controllers/CategoryController.php');
include('../Controllers/ProduitsController.php');

$categories = new CategoryController();
$produits = new ProduitsController();
$defaultimage = '../assets/images/default.jpg';



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
            <div style="margin-top:50px" class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Ajouter un produit</h2>
                       
                    </div>


                        <form enctype="multipart/form-data" method="POST" action="../Controllers/AddArticleController.php" style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; height:800px ; width: 90%">
                        
                          <img style="width:20%; height:150px" src="../assets/images/default.jpg" loading="lazy"/>
                        
                          <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:20% ;" class="">   
                          <label class="articleimageclick" style="font-weight:bold ; cursor:pointer"> <button type="button" style="border:none; background-color:black; width:150px; height:50px; cursor:pointer; color:white"> Modifier l'image par défaut</button>  
                          </label> 
                          <input name="file" style="visibility:hidden" type="file" class="articleimage"/>
                           
                          </div> 

                          <div style="display:flex; flex-direction:column;justify-content:space-between; align-items:center ; height:100% ; width: 60%"> 
                            <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:100% ;" class="">   
                              <label style="font-weight:bold"> Libellé : </label> 
                              <input name='libelle' placeholder="Nom de l'article" type="text" value="" class="input"/> 
                            </div> 
                           
                            <div style=" display:flex; flex-direction:row;justify-content:space-between; align-items:center ;width:100%" class="">   
                              <label style="font-weight:bold"> Catégorie : </label> 
                              <select style="border:none ;" style="background-color:transparent" class="input"  name="category" id="cars">

                              <?php
                                $myCategories = $categories -> getCategories();
                                        foreach ($myCategories as $eachcategorie) {
                                            echo'
                                            <option value="'.$eachcategorie['libelle'].'">'.$eachcategorie['libelle'].'</option>
                                            ';
                                        }
                               ?>
                                    
                              </select>
                            </div> 

                            <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:100% ;" class="">   
                              <label style="font-weight:bold"> Caractéristiques : </label> 
                              <textarea name="caracteristiques" style="height:auto" class="input" rows="10" cols="50">  </textarea> 
                            </div> 
                          

                            <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:100% ;" class="">   
                            <label style="font-weight:bold"> Description : </label> 
                            <textarea name="description" style="height:auto" class="input" rows="10" cols="50">  </textarea> 
                            </div>      


                            <div style=" display:flex; flex-direction:row;justify-content:space-between; align-items:center ;width:100%" class="">   
                            <label style="font-weight:bold"> Prix en FCFA : </label> 
                            <input name="prix" style="width:50%;" placeholder="Prix de l'article" type="text" value="" class="input"/> 
                            </div> 
                            

                            <div style=" display:flex; flex-direction:row;justify-content:space-between; align-items:center ;width:100%" class="">   
                           
                            <input style="width:50%;background-color: hsl(221, 96%, 61%) ; color:white ; border: none ; border-radius:5px; cursor:pointer " type="submit" value="Valider" class="input"/> 
                            </div> 
                           
                          </div>  
                        </form>
                        
                </div>

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../assets/js/main.js"></script>
    

    <script >

        function voirdetails(id){

            
        fetch(
            "../../Views/Productiday.php", {
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
                    window.location.replace('EditDetails.php')
                }
            }
        ); 


        }

        document.querySelector('.articleimageclick').addEventListener('click' , ()=>{
          document.querySelector('.articleimage').click();
        })

    </script>


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>