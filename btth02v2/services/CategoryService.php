<?php
require_once("configs/DBConnection.php");
include("models/Category.php");
class CategoryService{
    public function getAllCategory(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "select * from theloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $categories = [];
        while($row = $stmt->fetch()){
            $category = new Category($row['ma_tloai'], $row['ten_tloai']);
            array_push($categories,$category);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $categories;
    }
    public function getCategory(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();
        $id = $_GET['id'];
        // B2. Truy vấn
        $sql = "select * from theloai where ma_tloai='$id'";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả

        $row = $stmt->fetch();
            $category = new Category($row['ma_tloai'], $row['ten_tloai']);

        // Mảng (danh sách) các đối tượng Article Model

        return $category;
    }
    public function addCategory():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $name = $_POST['txtCatName'];   

        $sql = "insert into theloai(ten_tloai) 
        values ('$name')";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        
            
        // Mảng (danh sách) các đối tượng Category Model

        header('location:index.php?controller=Category&action=list');
    }
    public function updateCategory():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        // B2. Truy vấn
        $name = $_POST['txtCatName'];  
        $id =$_POST['txtCatId'];
    
        $sql = "UPDATE theloai
                SET ten_tloai = '$name'
                WHERE ma_tloai = '$id';";

        $stmt = $conn->query($sql);
        
        //die($stmt);
        // Mảng (danh sách) các đối tượng Category Model

        header('location:index.php?controller=Category&action=list');
    }
    public function deleteCategory():void{
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $id =$_GET['id'];
    
        $sql = "delete from theloai
                WHERE ma_tloai = '$id';";

        $stmt = $conn->query($sql);
        
        //die($stmt);
        // Mảng (danh sách) các đối tượng Category Model

        header('location:index.php?controller=Category&action=list');
    }
    public function countCategory(){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();    
        $sql = "select count(*) from theloai";

        $stmt = $conn->query($sql);
        $category = $stmt->fetch();
        return $category;
        //die($stmt);
        // Mảng (danh sách) các đối tượng Category Model

        //header('location:index.php?controller=Category&action=list');
    }
}