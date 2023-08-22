<?php
require_once '../App/Database.php';

class Category {


    public static function getCategory() {
       
        $db = new Database();

        $query = "SELECT * FROM categorie";
        $results = $db->query($query);
             
        return $results -> fetchAll() ;
       
    } 

    public static function insertCategorie (){
        
        $db = new Database();

        $query = "INSERT INTO categorie (libelle , fondecran) VALUES (:libelle , :fondecran)";
        $params = [':libelle' => $_POST['libelle'], ':fondecran' => $_POST['fondecran'] ];
        $result = $db->query($sql);

        return 'Done';
        
    }
    
}