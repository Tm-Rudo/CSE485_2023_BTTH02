<?php
require_once("configs/DBConnection.php");
include("services/MemberService.php");

class MemberController{
 
    public function login(){
        // Nhiệm vụ 2: Tương tác với View
        include("views/member/login.php");
    }

}

