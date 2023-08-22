<?php

require_once '../Models/ConfigurationSiteModel.php';

class ConfigurationController {
   
    public static function getSiteConfigs() {
        
        $configuration = ConfigurationSIteModel::getSiteConfiguration();
        
        return $configuration;

    }

  
}
