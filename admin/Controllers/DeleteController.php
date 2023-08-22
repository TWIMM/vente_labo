<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../Models/DeleteModel.php');
include('../Controllers/CategoryController.php');


print_r($_POST);

if($_POST['id'] !== ''){
    DeleteModel::Delete($_POST['id']);
    header('Location: ../Views/index.php');
}


