<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../Models/AjouterCatégorieModel.php');
include('../Controllers/CategoryController.php');


print_r($_POST);

if($_POST['libelle'] !== ''){
    AddCatégorie::AddCatégorie($_POST['libelle']);
    header('Location: ../Views/index.php');
}


