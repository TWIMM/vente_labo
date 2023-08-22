<?php

require_once '../Models/Produits.php';

class ProduitsController {
   
    public static function getProduits() {
        
        $produits = ProduitsModel::getProduits();
        
        return $produits;

    }


    public static function getSpecifiqueProduct($id){
        $produits = ProduitsModel::getSpecifiqueProduct($id);
        return $produits;
    }

    public static function getAllProduits() {
        
        $produits = ProduitsModel::getAllProduits();
        
        return $produits;

    }

    public static function getSpecifiqueProd($id_categorie){
        $produits = ProduitsModel::getSpecifiqueProd($id_categorie);
        return $produits;
    }

    public static function getProductCategory($idcategory){
       
        $produitCategory = ProduitsModel::getProduitsCategory($idcategory);
        
        return $produitCategory;
    }

}
