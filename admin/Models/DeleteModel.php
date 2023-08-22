<?php
require_once '../../App/Database.php';

class DeleteModel {
   
    public static function Delete($id) {
       
        $db = new Database();

        $query = "DELETE FROM produits WHERE id=:id";
        $params = [ ':id' => $id ];
        $results = $db->query($query , $params);
             
        return $results = 'Done' ;
       
    } 

}