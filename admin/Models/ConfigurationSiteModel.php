<?php
require_once '../../App/Database.php';

class ConfigurationSIteModel {
   
    public static function getSiteConfiguration() {
       
        $db = new Database();

        $query = "SELECT * FROM configuration_site LIMIT 1";
        $results = $db->query($query);
             
        return $results -> fetch() ;
       
    } 


    public static function editSiteName($nom_site) {
       
        $db = new Database();

        $query = "UPDATE configuration_site SET nom_site =:nom_site WHERE id=1";
        $params = [":nom_site"=> $nom_site ];
        $results = $db->query($query , $params);
             
        return 'Done';
       
    } 

    public static function editEmail($email) {
       
        $db = new Database();

        $query = "UPDATE configuration_site SET admin_email =:admin_email WHERE id=1";
        $params = [":admin_email"=> $email ];
        $results = $db->query($query , $params);
             
        return 'Done';
        
    } 

    public static function editAdresse($adresse) {
       
        $db = new Database();

        $query = "UPDATE configuration_site SET adresse =:adresse WHERE id=1";
        $params = [":adresse"=> $adresse ];
        $results = $db->query($query , $params);
             
        return 'Done';
       
    } 

    public static function editApropos($apropos_reg) {
       
        $db = new Database();

        $query = "UPDATE configuration_site SET a_propos =:apropos_reg WHERE id=1";
        $params = [":apropos_reg"=> $apropos_reg ];
        $results = $db->query($query , $params);
             
        return 'Done';
       
    } 

    public static function editNumber($number) {
       
        $db = new Database();

        $query = "UPDATE configuration_site SET num_pro =:num_pro WHERE id=1";
        $params = [":num_pro"=> $number ];
        $results = $db->query($query , $params);
             
        return 'Done';
       
    } 

    
}