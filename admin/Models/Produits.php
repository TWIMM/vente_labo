<?php
require_once '../../App/Database.php';

class ProduitsModel {
   
    public static function getProduits() {
       
        $db = new Database();

        $query = "SELECT * FROM produits LIMIT 12";
        $results = $db->query($query);
             
        return $results -> fetchAll() ;
       
    } 

    public static function getAllProduits(){
        $db = new Database();

        $query = "SELECT * FROM produits";
        $results = $db->query($query);
             
        return $results -> fetchAll() ;
    }

    public static function getSpecifiqueProd ($id){
        $db = new Database();

        $query = "SELECT * FROM produits WHERE id_category = :id_categorie ";
        $params = [':id_categorie' => $id ];
        $results = $db->query($query , $params);
             
        return $results -> fetchAll() ;
    }

    public static function getSpecifiqueProduct ($id){
        $db = new Database();

        $query = "SELECT * FROM produits WHERE id = :id_produit ";
        $params = [':id_produit' => $id ];
        $results = $db->query($query , $params);
             
        return $results -> fetch() ;
    }

    public static function getProduitsCategory($idcategory){
        
        $db = new Database();

        $query = "SELECT * FROM categorie WHERE id_categorie = :id_category ";
        $params = [':id_category' => $idcategory ];
        $results = $db->query($query , $params);
             
        return $results -> fetch() ;
    }
}