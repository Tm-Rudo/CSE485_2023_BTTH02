<?php
class Category{
    // Thuộc tính
    private $id;
    private $name;



    public function __construct($id,$name){
        $this->id = $id;
        $this->name = $name;
    }

    // Setter và Getter
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }

}