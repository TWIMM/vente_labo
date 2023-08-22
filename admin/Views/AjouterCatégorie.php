<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
            <div style="margin-top:50px" class="details">
                <div class="recentOrders">
                   
                        <form method="POST" action='../Controllers/AjouterCatégorieController.php' style="display:flex; flex-direction:column;justify-content:space-around; align-items:center ; height:300px ; width: 90%">
                            <div class="cardHeader">
                            <h2>Ajouter une catégorie</h2>
                            
                            </div>


                            <div style="display:flex; flex-direction:row;justify-content:space-around; align-items:center ; width:90% ;" class="">   
                                <h4 class="articleimageclick" > 
                                    Nom de la catégorie :
                                </h4> 
                            <input name="libelle" placeholder="Nom de la catégorie" style="width:50%" type="text" class="input"/> 
                            <input style="width:20%;background-color: hsl(221, 96%, 61%) ; color:white ; border: none ; border-radius:5px; cursor:pointer " type="submit" value="Valider" class="input"/> 

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