<?php

require_once '../Models/CartItemDetailModel.php';


class CartItemDetailController{
    public static function cartDetail($id){
        
        $getCartItemDetail = CartItemDetailMModel::getCartItemDetail($id);
        return $getCartItemDetail;
        
    } 
}