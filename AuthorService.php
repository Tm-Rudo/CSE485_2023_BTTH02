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
        return $authors;
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

        $img = $_FILES['Image'];
        $file_name = basename($img['name']);
        $folder = 'assets/images/songs/';
        $path_file = $folder . $file_name;
        //die($path_file);
        move_uploaded_file($img['tmp_name'], $path_file);

        $sql = "insert into tacgia(ten_tgia, hinh_tgia) 
        values ('$name', '$file_name')";

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
        $id =$_POST['id'];
        $img = $_FILES['Image_new'];
        if($img['size']>0){
            $file_name = basename($img['name']);
            $folder = 'assets/images/songs/';
            $path_file = $folder . $file_name;
            //die($path_file);
            move_uploaded_file($img['tmp_name'], $path_file);
        }else{
            $file_name = $_POST['Image_old'];
            //die($file_name);
        }
        
        $sql = "UPDATE tacgia
                SET ten_tgia = '$name', hinh_tgia = '$file_name'
                WHERE ma_tgia = '$id';";
        //die($sql);
        $stmt = $conn->query($sql);

        header('location:index.php?controller=author&action=list');
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
        $author = $stmt->fetch();
        return $author;
    }
}