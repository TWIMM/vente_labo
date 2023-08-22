<?php

require_once '../App/Database.php';

class CartItemDetailMModel {
    
    public static function getCartItemDetail($id){
       
        $db = new Database();

        $query = "SELECT * FROM produits WHERE id=:id_produit";
        $params = [':id_produit' => $id];
        $results = $db->query($query , $params);
             
        return $results -> fetch() ;
    }
}