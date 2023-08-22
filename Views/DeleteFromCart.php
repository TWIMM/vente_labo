<?php
include('../Controllers/ShoppingCartController.php');

$elementToDelete = json_decode(file_get_contents('php://input')); 



if(isset($elementToDelete -> key)){
   
    ShoppingCartController::deleteFromCart($elementToDelete -> key);
    echo 'Deleted';
    
} 


