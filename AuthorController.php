<?php
require_once("configs/DBConnection.php");
include("services/AuthorService.php");

class AuthorController{
    // Hàm xử lý hành động index
    public function list(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthor();
         //die($authors);
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/list_author.php");
    }
     
    public function add(){
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/add_author.php");
    }

    public function add_process(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authorService->addAuthor();
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/add_author.php");
    }
    public function edit(){
        // Nhiệm vụ 1: Tương tác với Services/Models

        $authorService = new AuthorService();
        $author = $authorService->getAuthor();
        
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/edit_author.php");
    }
    public function update(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authorService->updateAuthor();
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/edit_author.php");
    }
    public function delete(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authorService->deleteAuthor();
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/edit_author.php");
    }
 
}

