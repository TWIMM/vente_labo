<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../Models/AddArticleModel.php');
include('../Controllers/CategoryController.php');


print_r($_POST);
print_r($_FILES['file']);



if($_FILES['file']['name'] === ''){

    /* Sil na change ni la photo */
    
    AddDetailsModel::AddDetail($_POST['libelle'] , $_POST['description'] , $_POST['prix'] , CategoryController::getCatIdFromLibelle($_POST['category'])['id_categorie'] , $_POST['caracteristiques'] , 'default.jpg' );
   
    header('Location: ../Views/index.php');

} else if($_FILES['file']['name'] !== ''){

    $imgname = htmlspecialchars($_FILES['file']['name']);

    $extensionsValides = array('jpg', 'jpeg', 'png'); 
    $extensionUpload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
    if(in_array($extensionUpload, $extensionsValides)) {
        $chemin = "../assets/images/".str_replace(' ','-',$imgname);
        $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);
    }

    if($resultat){
       
        AddDetailsModel::AddDetail($_POST['libelle'] , $_POST['description'] , $_POST['prix'] , CategoryController::getCatIdFromLibelle($_POST['category'])['id_categorie'] , $_POST['caracteristiques'] , str_replace(' ','-',$imgname) );
    
        header('Location: ../Views/index.php');
    }

}