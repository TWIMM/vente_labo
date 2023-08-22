<?php
require_once '../../App/Database.php';

class AddDetailsModel {
   
    public static function AddDetail($libelle , $description , $prix , $id_category , $caracteristiques , $myimage ) {
       
        $db = new Database();

        $query = "INSERT INTO produits (libelle , description , prix , id_category , caracteristiques , myimage ) VALUES (? ,?, ? , ? , ?, ?)";
        $params = [$libelle , $description ,$prix , $id_category , $caracteristiques , $myimage ];
        $results = $db->query($query , $params);
             
        return $results = 'Done' ;
       
    } 

}