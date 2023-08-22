<?php
session_start();

$categorie = json_decode(file_get_contents('php://input')); 
$id = $categorie -> id_categorie;


if( $categorie -> id_categorie ){
    $_SESSION['id_categorie'] = $id;
    echo 'OK' ;
}
 