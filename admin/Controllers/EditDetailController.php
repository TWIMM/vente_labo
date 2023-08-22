<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../Models/EditDetailsModel.php');
include('../Controllers/CategoryController.php');

$_SESSION['message'] = '';


$libelle = $_POST['libelle']; 
$description = $_POST['description']; 
$prix = $_POST['prix']; 
$id_category = $_POST['categorielib']; 
$caracteristiques = $_POST['caracteristiques']; 
$myimage = $_POST['defaultimage']; 
$id = $_POST['id'];



echo $_FILES['file']['name'];


if($_FILES['file']['name'] === '' && $_POST['newcategorie'] === $_POST['categorielib']){

    /* Sil na change ni la photo et la categorie */
    
    EditDetailsModel::editDetails($libelle , $description , $prix , CategoryController::getCatIdFromLibelle($id_category)['id_categorie'] , $caracteristiques , $myimage ,$id );
    $_SESSION['message'] = 'Modifié avec succès';
    header('Location: ../Views/EditDetails.php');

} else if($_FILES['file']['name'] === '' && $_POST['newcategorie'] !== $_POST['categorielib']) {

    EditDetailsModel::editDetails($libelle , $description , $prix , CategoryController::getCatIdFromLibelle($_POST['newcategorie'])['id_categorie']   , $caracteristiques , $myimage ,$id );
    $_SESSION['message'] = 'Modifié avec succès';
    header('Location: ../Views/EditDetails.php');
    /* Image non changé, categorie changé */


} else if($_FILES['file']['name'] !== '' && $_POST['newcategorie'] === $_POST['categorielib']) {
    
      /* image changé et categorie non change */

        $imgname = htmlspecialchars($_FILES['file']['name']);

		$extensionsValides = array('jpg', 'jpeg', 'png'); 
    	$extensionUpload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
    	if(in_array($extensionUpload, $extensionsValides)) {
        	$chemin = "../assets/images/".str_replace(' ','-',$imgname);
        	$resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);
        }

        if($resultat){
            
            EditDetailsModel::editDetails($libelle , $description , $prix , CategoryController::getCatIdFromLibelle($id_category)['id_categorie']   , $caracteristiques , str_replace(' ','-',$imgname) ,$id );
            $_SESSION['message'] = 'Modifié avec succès';
            header('Location: ../Views/EditDetails.php');
        }


} else if($_FILES['file']['name'] !== '' && $_POST['newcategorie'] !== $_POST['categorielib']){

    
    $imgname = htmlspecialchars($_FILES['file']['name']);

    $extensionsValides = array('jpg', 'jpeg', 'png'); 
    $extensionUpload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
    if(in_array($extensionUpload, $extensionsValides)) {
        $chemin = "../assets/images/".str_replace(' ','-',$imgname);
        $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);
    }

    if($resultat){
        
        EditDetailsModel::editDetails($libelle , $description , $prix , CategoryController::getCatIdFromLibelle($_POST['newcategorie'])['id_categorie']   , $caracteristiques , str_replace(' ','-',$imgname) ,$id );
        $_SESSION['message'] = 'Modifié avec succès';
        header('Location: ../Views/EditDetails.php');
    }

}



/* if(isset($_POST)){
    EditDetailsModel::editDetails($libelle , $description , $prix , $id_category , $caracteristiques , $myimage ,$id );
    echo 'Modifié';
} 
 */
