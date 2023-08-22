<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../Models/ConfigurationSiteModel.php');




if(isset($_POST['nomsite_reg']) && $_POST['nomsite_reg'] !== ''){
   if (ConfigurationSIteModel::editSiteName($_POST['nomsite_reg']) === 'Done')
      header('Location: ../Views/configuration.php');
}


if(isset($_POST['email_reg']) && $_POST['email_reg'] !== ''){
    if (ConfigurationSIteModel::editEmail($_POST['email_reg']) === 'Done')
       header('Location: ../Views/configuration.php');
}


if(isset($_POST['number_reg']) && $_POST['number_reg'] !== ''){
    if (ConfigurationSIteModel::editNumber($_POST['number_reg']) === 'Done')
       header('Location: ../Views/configuration.php');
}
 
if(isset($_POST['adresse']) && $_POST['adresse'] !== ''){
    if (ConfigurationSIteModel::editAdresse($_POST['adresse']) === 'Done')
       header('Location: ../Views/configuration.php');
}

if(isset($_POST['apropos_reg']) && $_POST['apropos_reg'] !== ''){
    if (ConfigurationSIteModel::editApropos($_POST['apropos_reg']) === 'Done')
       header('Location: ../Views/configuration.php');
}
 