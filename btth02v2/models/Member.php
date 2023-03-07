<?php
class Member{
    // Thuộc tính
    private $id;
    private $name;
    private $password;



    public function __construct($id,$name,$password){
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
    }

    // Setter và Getter
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getPassword(){
        return $this->password;
    }

}