<?php
require_once '../../App/Database.php';

class AddCatégorie {
   
    public static function AddCatégorie($libelle) {
       
        $db = new Database();

        $query = "INSERT INTO categorie (libelle) VALUES (?)";
        $params = [ $libelle ];
        $results = $db->query($query , $params);
             
        return $results = 'Done' ;
       
    } 

}