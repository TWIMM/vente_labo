<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../Controllers/CategoryController.php');
include('../Controllers/ProduitsController.php');
include('../../Controllers/ConfigurationSiteController.php');


$categories = new CategoryController();
$produits = new ProduitsController();
$configSite = new ConfigurationController();




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

                    <form method="POST" action='../Controllers/reglageController.php' style="display:flex; margin-top:5px;  flex-direction:column;justify-content:space-around; align-items:center ; height:300px ;">
                        <div class="cardHeader">
                            <h2>Modifier le nom de votre site</h2>

                        </div>

                        <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:90% ;" class="">
                            <h4 class="articleimageclick">
                                Nouveau nom du site :
                            </h4>
                            <input value="<?php echo $configSite -> getSiteConfigs()['nom_site'] ?>" name="nomsite_reg" placeholder="Nom du site" style="width:50%" type="text" class="input" />
                            <input style="width:20%;background-color: hsl(221, 96%, 61%) ; color:white ; border: none ; border-radius:0px; cursor:pointer " type="submit" value="Valider" class="input" />

                        </div>


                    </form> 


                    <form method="POST" action='../Controllers/reglageController.php' style="display:flex; margin-top:5px; flex-direction:column;justify-content:space-around; align-items:center ; height:300px ;">
                        <div class="cardHeader">
                            <h2>Modifier l'adresse e-mail de l'admin</h2>

                        </div>

                        <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:90% ;" class="">
                            <h4 class="articleimageclick">
                                Nouvelle adresse e-mail :
                            </h4>
                            <input value="<?php echo $configSite -> getSiteConfigs()['admin_email'] ?>" name="email_reg" placeholder="Nom du site" style="width:50%" type="text" class="input" />
                            <input style="width:20%;background-color: hsl(221, 96%, 61%) ; color:white ; border: none ; border-radius:0px; cursor:pointer " type="submit" value="Valider" class="input" />

                        </div>
                       
                    </form> 


                    <form method="POST" action='../Controllers/reglageController.php' style="display:flex; margin-top:5px;  flex-direction:column;justify-content:space-around; align-items:center ; height:300px ;">
                        <div class="cardHeader">
                            <h2>Modifier le numéro de l'admin</h2>

                        </div>

                        <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:90% ;" class="">
                            <h4 class="articleimageclick">
                                Numéro de téléphone :
                            </h4>
                            <input value="<?php echo $configSite -> getSiteConfigs()['num_pro'] ?>" name="number_reg" placeholder="Numéro de l'admin" style="width:50%" type="text" class="input" />
                            <input style="width:20%;background-color: hsl(221, 96%, 61%) ; color:white ; border: none ; border-radius:0px; cursor:pointer " type="submit" value="Valider" class="input" />

                        </div>


                    </form> 



                    <form method="POST" action='../Controllers/reglageController.php' style="display:flex; margin-top:5px;  flex-direction:column;justify-content:space-around; align-items:center ; height:300px ;">
                        <div class="cardHeader">
                            <h2>Écrivez quelque chose à propos de votre boutique</h2>

                        </div>

                        <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:90% ;" class="">
                            <h4 class="articleimageclick">
                                À propos de votre boutique :
                            </h4>
                            <textarea  name="apropos_reg" style="height:auto ; width:50%" class="input" rows="10">  <?php echo $configSite -> getSiteConfigs()['a_propos'] ?> </textarea> 
                            <input style="width:20%;background-color: hsl(221, 96%, 61%) ; color:white ; border: none ; border-radius:0px; cursor:pointer " type="submit" value="Valider" class="input" />

                        </div>


                    </form> 


                    <form method="POST" action='../Controllers/reglageController.php' style="display:flex; margin-top:5px;  flex-direction:column;justify-content:space-around; align-items:center ; height:300px ;">
                        <div class="cardHeader">
                            <h2>Situation géographique</h2>

                        </div>

                        <div style="display:flex; flex-direction:row;justify-content:space-between; align-items:center ; width:90% ;" class="">
                            <h4 class="articleimageclick">
                               Situation géographique :
                            </h4>
                            <textarea    name="adresse" style="height:auto ; width:50%" class="input" rows="10"> <?php echo $configSite -> getSiteConfigs()['adresse'] ?> </textarea> 
                            <input style="width:20%;background-color: hsl(221, 96%, 61%) ; color:white ; border: none ; border-radius:0px; cursor:pointer " type="submit" value="Valider" class="input" />

                        </div>


                    </form> 

                    
               </div>




           </div>
       </div>

    </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../assets/js/main.js"></script>


    <script>
        function voirdetails(id) {


            fetch(
                "../../Views/Productiday.php", {
                    method: "POST",
                    headers: {
                        "Accept-Content": "application/json",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        produitid: id,
                    })
                }
            ).then(
                data => data.text()
            ).then(

                (data) => {
                    console.log(data)
                    if (data === 'OK') {
                        window.location.replace('EditDetails.php')
                    }
                }
            );


        }

        document.querySelector('.articleimageclick').addEventListener('click', () => {
            document.querySelector('.articleimage').click();
        })
    </script>


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>