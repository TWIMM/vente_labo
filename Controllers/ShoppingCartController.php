<?php
session_start();

class ShoppingCartController {
   
    public static function insertInCart ($id_produit , $quantite){
       
        if(isset($_SESSION['cart'][$id_produit])){
            
            ++$_SESSION['cart'][$id_produit];
            
        } else {

            $_SESSION['cart'][$id_produit] = $quantite;
           
        }

      

    }

    public static function deleteFromCart($key){

        if (isset($_SESSION['cart'])) {
            $array = $_SESSION['cart'];

            $elementKeyToDelete = $key;
            
            if (isset($array[$elementKeyToDelete])) {
                unset($array[$elementKeyToDelete]); 
                $_SESSION['cart'] = $array; 
            }

        
        }

    }

   
}