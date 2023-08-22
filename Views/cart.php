<?php
include('../Controllers/ShoppingCartController.php');

$cartInfo = json_decode(file_get_contents('php://input')); 



if(isset($cartInfo -> idproduit) && isset($cartInfo -> quantite)){
   
    ShoppingCartController::insertInCart($cartInfo -> idproduit , $cartInfo -> quantite);
    echo 'Added';
} 