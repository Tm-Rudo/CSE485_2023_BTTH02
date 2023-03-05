<?php
require_once("configs/DBConnection.php");
include("models/Author.php");
class AuthorService{
    public function getAllAuthor(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "select * from tacgia";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $authors = [];
        while($row = $stmt->fetch()){
            $author = new Author($row['ma_tgia'], $row['ten_tgia'],$row['hinh_tgia']);
            array_push($authors,$author);
        }


        return $author;
    }
    public function getAuthor(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();
        $id = $_GET['id'];
        // B2. Truy vấn
        $sql = "select * from tacgia where ma_tgia='$id'";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả

        $row = $stmt->fetch();
            $author = new Author($row['ma_tgia'], $row['ten_tgia'],$row['hinh_tgia']);


        return $author;
    }
    public function addAuthor():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $name = $_POST['txtAutName'];   

        $sql = "insert into tacgia(ten_tgia) 
        values ('$name')";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả

        header('location:index.php?controller=Author&action=list');
    }
    public function updateAuthor():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $name = $_POST['txtAutName'];  
        $id =$_POST['txtAutId'];
    
        $sql = "UPDATE tacgia
                SET ten_tgia = '$name'
                WHERE ma_tgia = '$id';";

        $stmt = $conn->query($sql);

        header('location:index.php?controller=Author&action=list');
    }
    public function deleteAuthor():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $id =$_GET['id'];
    
        $sql = "delete from tacgia
                WHERE ma_tgia = '$id';";

        $stmt = $conn->query($sql);
        
        header('location:index.php?controller=Author&action=list');
    }
    public function countAuthor():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $id =$_GET['id'];
    
        $sql = "select count(*) from tacgia";

        $stmt = $conn->query($sql);

    }
}