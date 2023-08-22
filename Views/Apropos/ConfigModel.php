<?php
require_once '../../App/Database.php';

class ConfigModel {
   
    public static function getSiteConfiguration() {
       
        $db = new Database();

        $query = "SELECT * FROM configuration_site LIMIT 1";
        $results = $db->query($query);
             
        return $results -> fetch() ;
       
    } 
    
}