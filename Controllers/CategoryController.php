<?php

require_once '../Models/Category.php';

class CategoryController {
   
    public static function getCategories() {
        
        $categories = Category::getCategory();
        
        return $categories;

    }

  /*   public static function getSpecifiqueCat ($id){
        $product = Category::getSpecifiqueCat($id);
        
        return $product;
    } */

}
