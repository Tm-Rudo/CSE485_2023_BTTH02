<?php
require_once("configs/DBConnection.php");
include("services/CategoryService.php");

class CategoryController{
    // Hàm xử lý hành động index
    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategory();
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/list_category.php");
    }

    public function add(){
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/add_category.php");
    }
    public function add_process(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $categoryService->addCategory();
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/add_category.php");
    }
    public function edit(){
        // Nhiệm vụ 1: Tương tác với Services/Models

        $categoryService = new CategoryService();
        $category = $categoryService->getCategory();
        
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/edit_category.php");
    }
    public function update(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $categoryService->updateCategory();
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/edit_category.php");
    }
    public function delete(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $categoryService->deleteCategory();
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/edit_category.php");
    }
    

}