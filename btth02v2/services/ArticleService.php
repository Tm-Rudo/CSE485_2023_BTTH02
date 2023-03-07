<?php
require_once("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "select baiviet.*, theloai.ten_tloai,tacgia.ten_tgia from (baiviet join theloai on baiviet.ma_tloai = theloai.ma_tloai)JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia order by ma_bviet asc ";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'],
            $row['tomtat'],$row['noidung'],$row['ten_tloai'],$row['ma_tloai'],$row['ten_tgia'],$row['ma_tgia'],$row['ngayviet'],$row['hinhanh']);
            array_push($articles,$article);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }
    public function getArticle(){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $id = $_GET['id'];
        // B2. Truy vấn
        $sql = "select baiviet.*, theloai.ten_tloai,tacgia.ten_tgia from (baiviet join theloai on baiviet.ma_tloai = theloai.ma_tloai)JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
        where ma_bviet = '$id'";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
            $row = $stmt->fetch();
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'],
            $row['tomtat'],$row['noidung'],$row['ten_tloai'],$row['ma_tloai'],$row['ten_tgia'],$row['ma_tgia'],$row['ngayviet'],$row['hinhanh']);
            
        // Mảng (danh sách) các đối tượng Article Model

        return $article;
    }
    public function addArticle():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $title = $_POST['txtTitle'];
        $name = $_POST['txtName'];  
        $category_id = $_POST['category_id'];  
        $summary = $_POST['txtSummary'];  
        $content = $_POST['txtContent'];  
        $author_id = $_POST['author_id'];  
        $img = $_FILES['Image'];
        $file_name = basename($img['name']);
        $folder = 'assets/images/songs/';
        $path_file = $folder . $file_name;
        //die($path_file);
        move_uploaded_file($img['tmp_name'], $path_file);
        $sql = "insert into baiviet(tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,hinhanh) 
        values ('$title', '$name', '$category_id', '$summary', '$content', '$author_id', '$file_name')";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        
            
        // Mảng (danh sách) các đối tượng Article Model

        header('location:index.php?controller=article&action=list');
    }
    public function updateArticle():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $title = $_POST['txtTitle'];
        $name = $_POST['txtName'];  
        $category_id = $_POST['category_id'];  
        $summary = $_POST['txtSummary'];  
        $content = $_POST['txtContent'];  
        $author_id = $_POST['author_id'];  
        $img = $_FILES['image_new'];
        if($img['size']>0){
            $file_name = basename($img['name']);
            $folder = 'assets/images/songs/';
            $path_file = $folder . $file_name;
            //die($path_file);
            move_uploaded_file($img['tmp_name'], $path_file);
        }else{
            $file_name = $_POST['image_old'];
            //die($file_name);
        }
        $id =$_POST['id'];
    
        $sql = "UPDATE baiviet
                SET tieude = '$title' ,ten_bhat = '$name', ma_tloai = '$category_id', tomtat = '$summary', noidung = '$content', ma_tgia = '$author_id', hinhanh = '$file_name'
                WHERE ma_bviet = '$id';";

        $stmt = $conn->query($sql);
        
        //die($stmt);
        // Mảng (danh sách) các đối tượng Article Model

        header('location:index.php?controller=article&action=list');
    }
    public function deleteArticle():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $id =$_GET['id'];
    
        $sql = "delete from baiviet
                WHERE ma_bviet = '$id';";

        $stmt = $conn->query($sql);
        
        //die($stmt);
        // Mảng (danh sách) các đối tượng Article Model

        header('location:index.php?controller=article&action=list');
    }
    public function countArticle(){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
    
        $sql = "select count(*) from baiviet";

        $stmt = $conn->query($sql);
        $article = $stmt->fetch();
        //die($stmt);
        // Mảng (danh sách) các đối tượng Article Model
        return $article;
        //header('location:index.php?controller=article&action=list');
    }
}