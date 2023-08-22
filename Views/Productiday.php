<?php
session_start();

$produitid = json_decode(file_get_contents('php://input')); 
$id = $produitid -> produitid;


if( $produitid -> produitid ){
    $_SESSION['id'] = $id;
    echo 'OK' ;
}
 