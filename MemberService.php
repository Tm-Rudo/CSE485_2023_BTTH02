<?php
require_once("configs/DBConnection.php");
include("models/Member.php");
class MemberService{
    public function check_login():void{
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $user = $_POST['txtUser'];
        $password = $_POST['txtPass'];

        require_once 'includes/connect.php';
        $sql = "select count(*) from nguoidung 
        where ten_ndung = '$user' and mat_khau='$password'";
        $result = $conn ->query($sql);
        $number_rows = $result->fetchColumn();
        if($number_rows == 1){
        header('location:?controller=home&action=index_admin');
        exit;
        }

        header('location:login.php?error=Login Wrong!');
    }
    public function countMember(){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
    
        $sql = "select count(*) from nguoidung";

        $stmt = $conn->query($sql);
        $member = $stmt->fetch();
        //die($stmt);
        return $member;
    }
}