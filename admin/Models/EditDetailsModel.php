<?php
require_once '../../App/Database.php';

class EditDetailsModel {
   
    public static function editDetails($libelle , $description , $prix , $id_category , $caracteristiques , $myimage , $id) {
       
        $db = new Database();

        $query = "UPDATE produits SET libelle =:libelle , description =:descriptions , prix =:prix , id_category =:id_category , caracteristiques=:carateristiques , myimage=:myimage WHERE id=:id";
        $params = [":libelle"=> $libelle , ":descriptions" => $description , ":prix" => $prix , ":id_category" => $id_category , ":carateristiques" => $caracteristiques , ":myimage" => $myimage , ":id"=>$id];
        $results = $db->query($query , $params);
             
        return $results = 'Done' ;
       
    } 

}