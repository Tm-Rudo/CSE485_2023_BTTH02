<?php
require_once("configs/DBConnection.php");
include("services/MemberService.php");

class MemberController{
 
    public function login(){
        // Nhiệm vụ 2: Tương tác với View
        include("views/member/login.php");
    }
    public function check_login(){
        // Nhiệm vụ 2: Tương tác với View
        $memberService = new MemberService;
        $memberService->check_login();
        include("views/member/login.php");
    }

}

