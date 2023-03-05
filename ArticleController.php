<?php
require_once("configs/DBConnection.php");
include("services/ArticleService.php");
include("services/CategoryService.php");
include("services/AuthorService.php");

class ArticleController{
    // Hàm xử lý hành động index
    public function index(){
        $articelService = new ArticleService();
        $stmt = $articelService->getArticle();
        //echo $art->getName();
        //echo json_encode($stmt->getName());
        include("views/article/detail.php");
    }
    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $articles = $articelService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/list_article.php");
    }
    public function add(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // $articelService = new ArticleService();
        // $articelService->addArticle();

        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategory();
        
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthor();
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/add_article.php");
    }
    public function add_process(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $articelService->addArticle();
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/add_article.php");
    }
    public function edit(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $article = $articelService->getArticle();

        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategory();
        
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthor();
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/edit_article.php");
    }
    public function update(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $articelService->updateArticle();
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/edit_article.php");
    }
    public function delete(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $articelService->deleteArticle();
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/edit_article.php");
    }

}