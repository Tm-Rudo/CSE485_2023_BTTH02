<?php
require_once("configs/DBConnection.php");
include("services/ArticleService.php");
include("services/AuthorService.php");
include("services/CategoryService.php");
include("services/MemberService.php");
class HomeController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $articles = $articelService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/home/index.php");
    }
    public function index_admin(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articelService = new ArticleService();
        $article = $articelService->countArticle();

        $categoryService = new CategoryService();
        $category = $categoryService->countCategory();
        
        $authorService = new AuthorService();
        $author = $authorService->countAuthor();

        $memberService= new MemberService();
        $member = $memberService->countMember();
        // Nhiệm vụ 2: Tương tác với View
        include("views/admin/index.php");
    }
}