<?php

require_once 'ConfigModel.php';

class ConfigController {
   
    public static function getSiteConfigs() {
        
        $configuration = ConfigModel::getSiteConfiguration();
        
        return $configuration;

    }

  
}
