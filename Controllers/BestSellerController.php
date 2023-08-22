<?php

require_once '../Models/BestSeller.php';

class BestSellerController {
   
    public static function getProduits() {
        
        $produits = BestSellerModel::getBestProduct();
        
        return $produits;

    }

    public static function getProductProduitDetail($idProduit){
        $produits = BestSellerModel::getProductDetail($idProduit);
        return $produits;
    }


}
