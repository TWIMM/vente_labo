<?php
require_once '../App/Database.php';

class BestSellerModel {
   
    public static function getBestProduct() {
       
        $db = new Database();

        $query = "SELECT * FROM bestseller";
        $results = $db->query($query);
             
        return $results -> fetchAll() ;
       
    } 

    public static function getProductDetail($idProduit){
        
        $db = new Database();

        $query = "SELECT * FROM produits WHERE id=:id_produit";
        $params = [':id_produit' => $idProduit];
        $results = $db->query($query , $params);
             
        return $results -> fetch() ;
    }

}